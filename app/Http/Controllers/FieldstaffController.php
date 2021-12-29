<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kantah;
use App\Models\Stages;
use App\Models\Fieldstaff;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreFieldstaffRequest;
use App\Http\Requests\UpdateFieldstaffRequest;

class FieldstaffController extends Controller
{

    public function __construct()
    {
        $this->middleware('kantah')->only('create');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::User()->level == '2') {
            $kantah = Kantah::where('user_id', Auth::User()->id)->first();
            $fieldstaffs = Fieldstaff::where('kantah_id', $kantah->id)->get();
            return view('kantah.data_fieldstaff.index', compact('fieldstaffs'));
        }
        if (Auth::User()->level == '1') {
            $fieldstaffs = Fieldstaff::all();
            return view('kanwil.data_fieldstaff.index', compact('fieldstaffs'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kantah.data_fieldstaff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFieldstaffRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFieldstaffRequest $request)
    {
        $validated = $request->validated();
        if ($validated['target'] < 1) {
            return back()->with('error', 'Jumlah target minimal 1');
        }
        $data['username'] = $validated['username'];
        $data['password'] = bcrypt($validated['password']);
        $data['level'] = 3;
        $createUser = User::create($data);
        if ($createUser) {
            $profile['name'] = $validated['name'];
            $profile['date_born'] = $validated['date_born'];
            $profile['alamat'] = $validated['alamat'];
            $profile['phone_number'] = $validated['phone_number'];
            $profile['target'] = $validated['target'];
            $profile['kantah_id'] = Kantah::where('user_id', Auth::User()->id)->first()->id;
            $profile['user_id'] = $createUser->id;
            $createProfile = Fieldstaff::create($profile);
            if ($createProfile) {
                $tahapan['pemetaan'] = 0;
                $tahapan['penyuluhan'] = 0;
                $tahapan['penyusunan'] = 0;
                $tahapan['pendampingan'] = 0;
                $tahapan['evaluasi'] = 0;
                $tahapan['fieldstaff_id'] = $createProfile->id;
                $createTahapan = Stages::create($tahapan);
                if ($createTahapan) {
                    return redirect('/dataFieldstaff')->with('success', 'Akun Fieldstaff berhasil dibuat');
                }
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fieldstaff  $fieldstaff
     * @return \Illuminate\Http\Response
     */
    public function show(Fieldstaff $fieldstaff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fieldstaff  $fieldstaff
     * @return \Illuminate\Http\Response
     */
    public function edit(Fieldstaff $fieldstaff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFieldstaffRequest  $request
     * @param  \App\Models\Fieldstaff  $fieldstaff
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFieldstaffRequest $request, Fieldstaff $fieldstaff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fieldstaff  $fieldstaff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fieldstaff $fieldstaff)
    {
        //
    }

    public function detFieldstaff($id)
    {
        $fieldstaff = Fieldstaff::where('id', $id)->first();
        $user = User::where('id', $fieldstaff->user_id)->first();
        return response()->json([
            'fieldstaff' => $fieldstaff,
            'user' => $user,
        ]);
    }
}
