<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kantah;
use App\Models\Report;
use App\Models\Stages;
use App\Models\Fieldstaff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateAkunRequest;
use App\Models\Plan;

class UserController extends Controller
{
    public function dashboard()
    {

        if (Auth::User()->level == 1) {
            $data['totalKantah'] = Kantah::count();
            $data['totalFieldstaff'] = Fieldstaff::count();
            $data['totalLaporan'] = Report::count();
            $data['tanggal_akhir'] = Report::orderBy('created_at', 'desc')->first();
            return view('kanwil.index')->with($data);
        } else if (Auth::User()->level == 2) {
            $data['fieldstaff'] = Fieldstaff::where('kantah_id', Kantah::getUser()->id)->get();
            $data['allData'] = Kantah::with('Fieldstaff', 'Fieldstaff.Report', 'Fieldstaff.Tahapan', 'Fieldstaff.Rencana')->where('user_id', Auth::User()->id)->first();
            return view('kantah.index')->with($data);
        } else if (Auth::User()->level == 3) {
            $fieldstaff = Fieldstaff::with('Tahapan')->where('user_id', Auth::User()->id)->first();
            $data['totalLaporan'] = Report::where('fieldstaff_id', $fieldstaff->id)->get();
            $data['laporanKeluhan'] = Report::where('fieldstaff_id', $fieldstaff->id)->whereNotNull('keluhan')->where('keluhan', '!=', '')->get();
            $data['laporanSaran'] = Report::where('fieldstaff_id', $fieldstaff->id)->whereNotNull('saran')->where('saran', '!=', '')->get();
            $data['tanggal_akhir'] = Report::where('fieldstaff_id', $fieldstaff->id)->orderBy('created_at', 'desc')->first();
            $data['persenPemetaan'] = $fieldstaff->Tahapan->pemetaan / $fieldstaff->target * 100;
            $data['persenPenyuluhan'] = $fieldstaff->Tahapan->penyuluhan / $fieldstaff->target * 100;
            $data['persenPenyusunan'] = $fieldstaff->Tahapan->penyusunan / $fieldstaff->target * 100;
            $data['persenPendampingan'] = $fieldstaff->Tahapan->pendampingan / $fieldstaff->target * 100;
            $data['persenEvaluasi']  = $fieldstaff->Tahapan->evaluasi / $fieldstaff->target * 100;
            return view('fieldstaff.index')->with($data);
        }
    }

    public function editAkun()
    {
        if (Auth::User()->level == 1) {
            return view('kanwil.editAkun');
        } else if (Auth::User()->level == 2) {
            return view('kantah.editAkun');
        } else if (Auth::User()->level == 3) {
            return view('fieldstaff.editAkun');
        }
    }

    public function updateProfile(Request $request, User $id)
    {
        if ($id->level == 3) {
            $validated = $request->validate([
                'name' => 'required',
                'date_born' => 'required',
                'alamat' => 'required',
                'phone_number' => 'required'
            ]);
            $fieldstaff = Fieldstaff::where('user_id', $id->id)->first();
            $updateData = $fieldstaff->update($validated);
            if ($updateData) {
                return back()->with('success', 'Data berhasil diupdate');
            }
        }

        if ($id->level == 2) {
            $validated = $request->validate([
                'name' => 'required',
                'email' => 'required',
                'head_name' => 'required',
                'nip_head_name' => 'required'
            ]);
            $kantah = Kantah::where('user_id', $id->id)->first();
            $updateData = $kantah->update($validated);
            if ($updateData) {
                return back()->with('success', 'Data berhasil diupdate');
            }
        }
    }

    public function updateAkun(UpdateAkunRequest $request, User $id)
    {
        $validated = $request->validated();
        if (!Hash::check($validated['password_lama'], $id->password)) {
            return back()->with('error', 'Password Lama tidak sesuai');
        }

        $data['username'] = $validated['username'];
        $data['password'] = bcrypt($validated['password']);
        $update = $id->update($data);
        if ($update) {
            return back()->with('success', 'Data berhasil diupdate');
        }
    }
}
