<?php

namespace App\Http\Controllers;

use App\Models\Stages;
use App\Http\Requests\StoreStagesRequest;
use App\Http\Requests\UpdateStagesRequest;

class StagesController extends Controller
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
