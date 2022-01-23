<?php

namespace App\Http\Controllers;

use App\Models\Stages;
use Illuminate\Http\Request;
use App\Models\TahapanHistory;
use Illuminate\Support\Facades\DB;

class TahapanHistoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TahapanHistory $dataHistori)
    {
        $dataTahapan = Stages::where('fieldstaff_id', $dataHistori->fieldstaff_id)->first();
        if ($dataHistori->tahapan == 'pemetaan') {
            $dataTahapan->update(['pemetaan' => DB::raw("pemetaan-$dataHistori->jumlah")]);
        } else if ($dataHistori->tahapan == 'penyuluhan') {
            $dataTahapan->update(['penyuluhan' => DB::raw("penyuluhan-$dataHistori->jumlah")]);
        } else if ($dataHistori->tahapan == 'penyusunan') {
            $dataTahapan->update(['penyusunan' => DB::raw("penyusunan-$dataHistori->jumlah")]);
        } else if ($dataHistori->tahapan == 'pendampingan') {
            $dataTahapan->update(['pendampingan' => DB::raw("pendampingan-$dataHistori->jumlah")]);
        } else if ($dataHistori->tahapan == 'evaluasi') {
            $dataTahapan->update(['evaluasi' => DB::raw("evaluasi-$dataHistori->jumlah")]);
        }
        $dataHistori->forceDelete();
        return back()->with('success', 'Histori Tahapan berhasil dihapus');
    }
}
