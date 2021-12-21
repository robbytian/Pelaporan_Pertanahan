<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kantah;
use App\Models\Kanwil;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreKantahRequest;
use App\Http\Requests\UpdateKantahRequest;

class KantahController extends Controller
{
    public function __construct()
    {
        $this->middleware('kanwil')->only('create', 'store');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allKantah = Kantah::with('Fieldstaff')->get();
        return view('kanwil.kantah.index', compact('allKantah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kanwil.kantah.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKantahRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKantahRequest $request)
    {
        $validated = $request->validated();
        $data['username'] = $validated['username'];
        $data['password'] = bcrypt($validated['password']);
        $data['level'] = 2;
        $createUser = User::create($data);
        if ($createUser) {

            $profile['name'] = $validated['name'];
            $profile['email'] = $validated['email'];
            $profile['head_name'] = $validated['head_name'];
            $profile['nip_head_name'] = $validated['nip_head_name'];
            $profile['kanwil_id'] = Kanwil::where('user_id', Auth::User()->id)->first()->id;
            $profile['user_id'] = $createUser->id;
            $createProfile = Kantah::create($profile);

            if ($createProfile) {
                return redirect('/dataKantah');
            }
        }
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

    public function detKantah($id)
    {
        $kantah = Kantah::where('id', $id)->first();
        $user = User::where('id', $kantah->user_id)->first();
        return response()->json([
            'kantah' => $kantah,
            'user' => $user,
        ]);
    }
}
