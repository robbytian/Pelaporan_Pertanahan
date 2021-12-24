<?php

namespace App\Http\Controllers;

use App\Models\Stages;
use App\Models\Fieldstaff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreStagesRequest;
use App\Http\Requests\UpdateStagesRequest;

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
            $fieldstaff = Fieldstaff::where('user_id', Auth::User()->id)->first();
            $tahapan = Stages::where('fieldstaff_id', $fieldstaff->id)->first();
            return view('fieldstaff.data_tahapan.index', compact('tahapan', 'fieldstaff'));
        } else if (Auth::User()->level == 2) {
            return view('kantah.data_tahapan.index');
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
        $tahapan = Stages::where('fieldstaff_id', \App\Models\Fieldstaff::getUser()->id)->first();
        return view('fieldstaff.data_tahapan.create', compact('tahapan'));
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
        return redirect('/dataTahapan');
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
}
