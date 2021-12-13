<?php

namespace App\Http\Controllers;

use App\Models\Kanwil;
use App\Http\Requests\StoreKanwilRequest;
use App\Http\Requests\UpdateKanwilRequest;

class KanwilController extends Controller
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
     * @param  \App\Http\Requests\StoreKanwilRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKanwilRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kanwil  $kanwil
     * @return \Illuminate\Http\Response
     */
    public function show(Kanwil $kanwil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kanwil  $kanwil
     * @return \Illuminate\Http\Response
     */
    public function edit(Kanwil $kanwil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKanwilRequest  $request
     * @param  \App\Models\Kanwil  $kanwil
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKanwilRequest $request, Kanwil $kanwil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kanwil  $kanwil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kanwil $kanwil)
    {
        //
    }
}
