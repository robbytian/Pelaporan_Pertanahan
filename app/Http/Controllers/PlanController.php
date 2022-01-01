<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use App\Models\Plan;
use App\Models\User;
use App\Models\Report;
use App\Models\Stages;
use App\Models\Fieldstaff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePlanRequest;
use App\Http\Requests\UpdatePlanRequest;

class PlanController extends Controller
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
            $rencanas = Plan::where('fieldstaff_id', $fieldstaff->id)->orderByDesc('created_at')->get();
            return view('fieldstaff.data_rencana_bulanan.index', compact('rencanas'));
        } else if (Auth::User()->level == 2) {
            $data['plans'] = Plan::with('Fieldstaff')->whereIn('fieldstaff_id', function ($q) {
                $q->from('fieldstaffs')->select('id')->where('kantah_id', User::getUser()->id);
            })->orderBy('created_at', 'desc')->get();
            return view('kantah.data_rencana_bulanan.index')->with($data);
        } else if (Auth::User()->level == 1) {
            $plans = Plan::with('Fieldstaff')->orderBy('created_at', 'desc')->get();
            return view('kanwil.data_rencana_bulanan.index', compact('plans'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fieldstaff.data_rencana_bulanan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePlanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlanRequest $request)
    {

        $validated = $request->validated();
        $validated['periode'] = Carbon::createFromFormat('d-m-Y', $validated['periode'])->format('Y-m-d');
        $validated['fieldstaff_id'] = \App\Models\Fieldstaff::getUser()->id;
        $inputPlan = Plan::create($validated);
        if ($inputPlan) {
            return redirect('/dataRencana')->with('success', 'Data berhasil ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlanRequest  $request
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlanRequest $request, Plan $dataRencana)
    {
        $validated = $request->validated();

        $update = $dataRencana->update($validated);
        if ($update) {
            return back()->with('success', 'Data berhasil diupdate');
        }
        dd('aa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $dataRencana)
    {
        $dataRencana->delete();
        return back()->with('success', 'Rencana berhasil dihapus');
    }

    public function cetak()
    {
        return view('fieldstaff.data_rencana_bulanan.cetak');
    }


    public function detRencana(Plan $id)
    {
        $id->load('Fieldstaff');
        $id->periode = date('F Y', strtotime($id->periode));
        return response()->json([
            'rencana' => $id,
        ]);
    }

    public function cekPeriode(Fieldstaff $id, Request $request)
    {
        if (empty($request->awal) || empty($request->akhir)) {
            return response()->json(['data' => null]);
        }
        $periodeAwal = Carbon::createFromFormat('d-m-Y', $request->awal)->format('Y-m-d');
        $periodeAkhir = Carbon::createFromFormat('d-m-Y', $request->akhir)->format('Y-m-d');
        $alldata = $id->load(['Rencana' => function ($query) use ($periodeAwal, $periodeAkhir) {
            $query->where('periode', '>=', $periodeAwal)->where('periode', '<=', $periodeAkhir);
        }]);
        foreach ($alldata->Rencana as $data) {
            $rencana[] = [
                "periode" => date('F Y', strtotime($data->periode)),
                'lokasi' => $data->lokasi,
                'tindak_lanjut' => $data->tindak_lanjut
            ];
        }

        return response()->json(['data' => @$rencana]);
    }

    public function cetakRencana(Fieldstaff $id, Request $request)
    {
        $periodeAwal = Carbon::createFromFormat('d-m-Y', $request->awal)->format('Y-m-d');
        $periodeAkhir = Carbon::createFromFormat('d-m-Y', $request->akhir)->format('Y-m-d');
        $alldata = $id->load(['Rencana' => function ($query) use ($periodeAwal, $periodeAkhir) {
            $query->where('periode', '>=', $periodeAwal)->where('periode', '<=', $periodeAkhir);
        }]);
        $pdf = PDF::loadView('layouts.pdf_rencana', ['alldata' => $alldata, 'awal' => $periodeAwal, 'akhir' => $periodeAkhir]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download("Rencana Bulanan - " . $id->name . "_" . date("YmdHis") . ".pdf");
    }
}
