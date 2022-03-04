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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::User()->level == '2') {
            $kantah = Kantah::where('user_id', Auth::User()->id)->first();
            $fieldstaffs = Fieldstaff::with('Kantah', 'Kanwil')->where('kantah_id', $kantah->id)->get();
            return view('kantah.data_fieldstaff.index', compact('fieldstaffs'));
        }
        if (Auth::User()->level == '1') {
            $fieldstaffs = Fieldstaff::with('Kantah', 'Kanwil')->orderBy('created_at', 'desc')->get();
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
        if (Auth::User()->level == '2') {
            return view('kantah.data_fieldstaff.create');
        }
        if (Auth::User()->level == '1') {
            return view('kanwil.data_fieldstaff.create');
        }
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
        $data['password'] = $validated['password'];
        $data['level'] = 3;
        $createUser = User::create($data);
        if ($createUser) {
            $profile['name'] = $validated['name'];
            $profile['date_born'] = $validated['date_born'];
            $profile['alamat'] = $validated['alamat'];
            $profile['phone_number'] = $validated['phone_number'];
            $profile['target'] = $validated['target'];
            $profile['user_id'] = $createUser->id;
            if (Auth::User()->level == 1) {
                $profile['kanwil_id'] = User::getUser()->id;
            } else if (Auth::User()->level == 2) {
                $profile['kantah_id'] = Kantah::where('user_id', Auth::User()->id)->first()->id;
            }
            $createProfile = Fieldstaff::create($profile);
            if ($createProfile) {
                $tahapan['penyuluhan'] = 0;
                $tahapan['pemetaan_sosial'] = 0;
                $tahapan['penyusunan_model'] = 0;
                $tahapan['pendampingan'] = 0;
                $tahapan['penyusunan_data'] = 0;
                $tahapan['fieldstaff_id'] = $createProfile->id;
                $createTahapan = Stages::create($tahapan);
            }
            if ($createProfile) {
                return redirect('/dataFieldstaff')->with('success', 'Akun Fieldstaff berhasil dibuat');
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
    public function update(UpdateFieldstaffRequest $request, Fieldstaff $dataFieldstaff)
    {
        $validated = $request->validated();
        $dataFieldstaff->load('User');
        if ($dataFieldstaff->kantah_id != null) {
            if ($validated['target'] == null) {
                return back()->with('error', 'Data Target tidak boleh kosong');
            }
            $profile['target'] = $validated['target'];
        }
        $data['username'] = $validated['username'];
        $data['password'] = $validated['password'];
        $profile['name'] = $validated['name'];
        $profile['date_born'] = $validated['date_born'];
        $profile['alamat'] = $validated['alamat'];
        $profile['phone_number'] = $validated['phone_number'];
        $updateUSer = $dataFieldstaff->User->update($data);
        $updateProfile = $dataFieldstaff->update($profile);
        if ($updateProfile && $updateUSer) {
            return back()->with('success', 'Data Fieldstaff berhasil diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fieldstaff  $fieldstaff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fieldstaff $dataFieldstaff)
    {
        $dataFieldstaff->delete();
        return back()->with('success', 'Akun berhasil dihapus');
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
