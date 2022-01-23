<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Stages;
use App\Models\Fieldstaff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreStagesRequest;
use App\Http\Requests\UpdateStagesRequest;
use App\Models\TahapanHistory;

class StagesController extends Controller
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
            $histories = TahapanHistory::where('fieldstaff_id', \App\Models\Fieldstaff::getUser()->id)->get();
            $fieldstaff = Fieldstaff::where('user_id', Auth::User()->id)->first();
            $tahapan = Stages::where('fieldstaff_id', $fieldstaff->id)->first();
            if (empty($tahapan)) {
                abort(404);
            }
            return view('fieldstaff.data_tahapan.index', compact('tahapan', 'fieldstaff', 'histories'));
        } else if (Auth::User()->level == 2) {
            $tahapans = Stages::with('Fieldstaff')->whereIn('fieldstaff_id', function ($q) {
                $q->from('fieldstaffs')->select('id')->where('kantah_id', User::getUser()->id);
            })->orderBy('created_at', 'desc')->get();
            return view('kantah.data_tahapan.index', compact('tahapans'));
        } else if (Auth::User()->level == 1) {
            $tahapans = Stages::with('Fieldstaff')->get();
            return view('kanwil.data_tahapan.index', compact('tahapans'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStagesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStagesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stages  $stages
     * @return \Illuminate\Http\Response
     */
    public function show(Stages $stages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stages  $stages
     * @return \Illuminate\Http\Response
     */
    public function edit(Stages $stages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStagesRequest  $request
     * @param  \App\Models\Stages  $stages
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStagesRequest $request, Stages $dataTahapan)
    {
        $validated = $request->validated();
        $jumlah = $validated['jumlahRealisasi'];
        $checkJumlah = $jumlah + $request->realisasiDiInput;
        if ($checkJumlah > $validated['targetFisik']) {
            return back()->with('error', 'Realisasi Fisik Tidak dapat melebihi Target Fisik')->withInput();
        } else {
            if ($validated['tahapan'] == 'pemetaan') {
                $dataTahapan->update(['pemetaan' => DB::raw("pemetaan+$jumlah")]);
            } else if ($validated['tahapan'] == 'penyuluhan') {
                $dataTahapan->update(['penyuluhan' => DB::raw("penyuluhan+$jumlah")]);
            } else if ($validated['tahapan'] == 'penyusunan') {
                $dataTahapan->update(['penyusunan' => DB::raw("penyusunan+$jumlah")]);
            } else if ($validated['tahapan'] == 'pendampingan') {
                $dataTahapan->update(['pendampingan' => DB::raw("pendampingan+$jumlah")]);
            } else if ($validated['tahapan'] == 'evaluasi') {
                $dataTahapan->update(['evaluasi' => DB::raw("evaluasi+$jumlah")]);
            }
        }
        TahapanHistory::create([
            'fieldstaff_id' => $dataTahapan->fieldstaff_id,
            'tahapan' => $validated['tahapan'],
            'jumlah' => $jumlah
        ]);

        return redirect('/dataTahapan')->with('success', 'Data Tahapan berhasil diinput');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stages  $stages
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stages $stages)
    {
        //
    }

    public function cekRealisasi(Fieldstaff $id, Request $request)
    {
        $fieldstaff = $id->load('Tahapan');
        if ($request->jenis == 'pemetaan') {
            $data = $fieldstaff->Tahapan->pemetaan;
            return response()->json(['realisasi' => $data]);
        } else if ($request->jenis == 'penyuluhan') {
            $data = $fieldstaff->Tahapan->penyuluhan;
            return response()->json(['realisasi' => $data]);
        } else if ($request->jenis == 'penyusunan') {
            $data = $fieldstaff->Tahapan->penyusunan;
            return response()->json(['realisasi' => $data]);
        } else if ($request->jenis == 'pendampingan') {
            $data = $fieldstaff->Tahapan->pendampingan;
            return response()->json(['realisasi' => $data]);
        } else if ($request->jenis == 'evaluasi') {
            $data = $fieldstaff->Tahapan->evaluasi;
            return response()->json(['realisasi' => $data]);
        }
    }

    public function inputTahapan()
    {
        $tahapan = Stages::where('fieldstaff_id', \App\Models\Fieldstaff::getUser()->id)->first();
        if (empty($tahapan)) {
            abort(404);
        }
        return view('fieldstaff.data_tahapan.create', compact('tahapan'));
    }
}
