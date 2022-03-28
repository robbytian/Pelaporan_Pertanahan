<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\User;
use App\Models\Report;
use App\Models\Fieldstaff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;
use App\Models\Participant;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('fieldstaff')->only('create');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::User()->level == 3) {
            $fieldstaff = Fieldstaff::where('user_id', Auth::User()->id)->first();
            $reports = Report::with('Participant')->where('fieldstaff_id', $fieldstaff->id)->orderByDesc('created_at')->get();
            return view('fieldstaff.data_laporan.index', compact('reports'));
        } else if (Auth::User()->level == 2) {
            $reports = Report::with('Fieldstaff', 'Participant')->whereIn('fieldstaff_id', function ($q) {
                $q->from('fieldstaffs')->select('id')->where('kantah_id', User::getUser()->id);
            })->orderBy('created_at', 'desc')->get();
            return view('kantah.data_laporan.index', compact('reports'));
        } else if (Auth::User()->level == 1) {
            $reports = Report::with('Fieldstaff', 'Participant')->orderBy('created_at', 'desc')->get();
            return view('kanwil.data_laporan.index', compact('reports'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fieldstaff.data_laporan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReportRequest $request)
    {
        $validated = $request->validated();
        if ($request->foto != null) {
            $file = $request->file('foto');
            $namaFile = date('mdYHis') . uniqid() . $validated['foto']->getClientOriginalName();
            $upload = $file->move(public_path('images/laporan'), $namaFile);
            if ($upload) {
                $data['foto'] = $namaFile;
            }
        }
        if ($request->keluhan != null) {
            $data['keluhan'] = $request->keluhan;
        }

        //cek apakah tanggal laporan sudah ada
        $cekTanggal = Report::where('tanggal_laporan', $validated['tanggal_laporan'])->where('fieldstaff_id', User::getUser()->id)->first();


        if (!empty($cekTanggal)) {
            return back()->with('error', 'Laporan untuk tanggal ' . date('d F Y', strtotime($validated['tanggal_laporan'])) . ' sudah ada')->withInput();
        }

        $data['kegiatan'] = implode(", ", $validated['kegiatans']);
        $data['tanggal_laporan'] = $validated['tanggal_laporan'];
        $data['keterangan'] = $validated['keterangan'];
        $data['fieldstaff_id'] = User::getUser()->id;
        $inputLaporan = Report::create($data);
        if ($inputLaporan) {
            foreach ($validated['peserta'] as $peserta) {
                Participant::create(['nama_peserta' => $peserta, 'laporan_id' => $inputLaporan->id]);
            }
            return redirect('/dataLaporan')->with('success', 'Laporan berhasil diinput');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReportRequest  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReportRequest $request, Report $dataLaporan)
    {
        $dataLaporan = $dataLaporan->load('Participant');
        $validated = $request->validated();
        if (Auth::User()->level == 3) {
            $dataLaporan->Participant->each->forceDelete();
            foreach ($validated['peserta'] as $peserta) {
                Participant::create(['nama_peserta' => $peserta, 'laporan_id' => $dataLaporan->id]);
            }
            $validated['kegiatan'] = implode(", ", $validated['kegiatans']);
        }
        $dataLaporan->update($validated);
        return back()->with('success', 'Laporan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $dataLaporan)
    {
        //hapus jika ada foto
        if (!empty($dataLaporan->foto)) {
            unlink(public_path('images/laporan') . '/' . $dataLaporan->foto);
        }

        // $dataLaporan->delete();
        $dataLaporan->forceDelete();
        return back()->with('success', 'Laporan berhasil dihapus');
    }

    public function cetak()
    {
        return view('fieldstaff.data_laporan.cetak');
    }

    public function detLaporan(Report $id)
    {

        $id = $id->load('Participant', 'Fieldstaff');
        $nama = [];
        foreach ($id->Participant as $part) {
            $nama[] = $part->nama_peserta;
        }
        $peserta = implode(', ', $nama);
        $id->tanggal_laporan = date('d F Y', strtotime($id->tanggal_laporan));
        $id->tanggal_input = date('d F Y', strtotime($id->created_at));
        return response()->json(['laporan' => $id, 'fieldstaff' => $id->Fieldstaff->name, 'namaPeserta' => $peserta, 'listPeserta' => $nama]);
    }

    public function cekPeriode(Fieldstaff $id, Request $request)
    {
        if (empty($request->awal) || empty($request->akhir)) {
            return response()->json(['data' => null]);
        }
        $periodeAwal = $request->awal;
        $periodeAkhir = $request->akhir;
        $alldata = $id->load(['Report' => function ($query) use ($periodeAwal, $periodeAkhir) {
            $query->where('tanggal_laporan', '>=', $periodeAwal)->where('tanggal_laporan', '<=', $periodeAkhir);
        }], 'Report.Participant', 'Kantah');
        foreach ($alldata->Report as $data) {
            $nama = [];
            foreach ($data->Participant as $part) {
                $nama[] = $part->nama_peserta;
            }
            $peserta = implode(', ', $nama);
            $laporan[] = [
                "tanggal_laporan" => date('d F Y', strtotime($data->tanggal_laporan)),
                'kegiatan' => $data->kegiatan,
                'keterangan' => $data->keterangan,
                // 'keluhan' => $data->keluhan,
                // 'saran' => $data->saran,
                'peserta' => $peserta,
                'foto' => $data->foto,
            ];
        }

        return response()->json(['data' => @$laporan]);
    }

    public function cetakLaporan(Fieldstaff $id, Request $request)
    {
        $periodeAwal = $request->awal;
        $periodeAkhir = $request->akhir;
        $alldata = $id->load(['Report' => function ($query) use ($periodeAwal, $periodeAkhir) {
            $query->where('tanggal_laporan', '>=', $periodeAwal)->where('tanggal_laporan', '<=', $periodeAkhir);
        }], 'Report.Participant', 'Kantah', 'Kanwil');
        $pdf = PDF::loadView('layouts.pdf_laporan', ['alldata' => $alldata, 'awal' => $periodeAwal, 'akhir' => $periodeAkhir]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download("Laporan - " . $id->name . "_" . date("YmdHis") . ".pdf");
    }
}
