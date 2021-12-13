<?php
namespace App\Http\Controllers;

use App\Models\Kantah;
use App\Http\Requests\StoreKantahRequest;
use App\Http\Requests\UpdateKantahRequest;

class KantahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kanwil.kantah');
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
     * @param  \App\Http\Requests\StoreKantahRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKantahRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kantah  $kantah
     * @return \Illuminate\Http\Response
     */
    public function show(Kantah $kantah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kantah  $kantah
     * @return \Illuminate\Http\Response
     */
    public function edit(Kantah $kantah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKantahRequest  $request
     * @param  \App\Models\Kantah  $kantah
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKantahRequest $request, Kantah $kantah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kantah  $kantah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kantah $kantah)
    {
        //
    }
}
