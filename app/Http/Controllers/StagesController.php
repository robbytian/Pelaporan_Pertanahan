<?php

namespace App\Http\Controllers;

use App\Models\Stages;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreStagesRequest;
use App\Http\Requests\UpdateStagesRequest;

class StagesController extends Controller
{
    public function __construct() {
        $this->middleware('fieldstaff')->only('create');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::User()->level == 3){
            return view('fieldstaff.tahapan.index');
        }else if(Auth::User()->level == 2){
            return view('kantah.tahapan.index');
        }
        else if(Auth::User()->level == 1){
            return view('kanwil.tahapan.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fieldstaff.tahapan.create');
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
    public function update(UpdateStagesRequest $request, Stages $stages)
    {
        //
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
}
