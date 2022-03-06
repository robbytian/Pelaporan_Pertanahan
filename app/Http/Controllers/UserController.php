<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\User;
use App\Models\Kantah;
use App\Models\Kanwil;
use App\Models\Report;
use App\Models\Stages;
use App\Models\Fieldstaff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateAkunRequest;

class UserController extends Controller
{
    public function dashboard()
    {
        $ranking = [];
        $rankingFS = [];
        if (Auth::User()->level == 1) {
            $data['fieldstaff'] = Fieldstaff::whereNotNull('kanwil_id')->where('kanwil_id', User::getUser()->id)->get();
            $data['totalKantah'] = Kantah::count();
            $data['totalFieldstaff'] = Fieldstaff::count();
            $data['totalLaporan'] = Report::count();
            $data['tanggal_akhir'] = Report::orderBy('created_at', 'desc')->first();
            $totalTarget = Fieldstaff::whereNotNull('kantah_id')->sum('target');
            $tahapan = Stages::whereIn('fieldstaff_id', function ($q) {
                $q->from('fieldstaffs')->select('id')->whereNotNull('kantah_id');
            })->get();
            if ($totalTarget > 0) {
                $data['persenPenyuluhan'] = $tahapan->sum('penyuluhan') / $totalTarget * 100;
                $data['persenPemetaan'] = $tahapan->sum('pemetaan_sosial') / $totalTarget * 100;
                $data['persenPenyusunanModel'] = $tahapan->sum('penyusunan_model') / $totalTarget * 100;
                $data['persenPendampingan'] = $tahapan->sum('pendampingan') / $totalTarget * 100;
                $data['persenPenyusunanData'] = $tahapan->sum('penyusunan_data') / $totalTarget * 100;
            } else {
                $data['persenPenyuluhan'] = 0;
                $data['persenPemetaan'] = 0;
                $data['persenPenyusunanModel'] = 0;
                $data['persenPendampingan'] = 0;
                $data['persenPenyusunanData'] = 0;
            }
            $kantahs = Kantah::with('Fieldstaff', 'Fieldstaff.Tahapan')->has('Fieldstaff')->get();
            foreach ($kantahs as $kantah) {
                $kinerja = 0;
                $totalRealisasi = 0;
                $totalTarget = ($kantah->Fieldstaff->sum('target')) * 5;

                foreach ($kantah->Fieldstaff as $field) {
                    $totalRealisasi += ($field->Tahapan->penyuluhan + $field->Tahapan->pemetaan_sosial + $field->Tahapan->penyusunan_model + $field->Tahapan->pendampingan + $field->Tahapan->penyusunan_data);
                }

                $totalRealisasi = $totalRealisasi / $totalTarget * 100;
                $ranking[] = [
                    'name' => $kantah->name, 'progress' => $totalRealisasi
                ];
            }

            foreach ($data['fieldstaff'] as $field) {
                $field->load('Tahapan');
                $totalTarget = $field->target * 2;
                $totalKinerja = $field->Tahapan->pemetaan_sosial  + $field->Tahapan->pendampingan;
                $kinerja = $totalKinerja / $totalTarget * 100;
                $rankingFS[] = [
                    'name' => $field->name, 'progress' => $kinerja
                ];
            }
            array_multisort(array_column($ranking, "progress"), SORT_DESC, $ranking);
            $collectRanking = collect($ranking);
            array_multisort(array_column($rankingFS, "progress"), SORT_DESC, $rankingFS);
            $collectRankingFS = collect($rankingFS);
            return view('kanwil.index', ['ranking' => $collectRanking, 'rankingFS' => $collectRankingFS])->with($data);
        } else if (Auth::User()->level == 2) {
            $ranking = [];
            $data['fieldstaff'] = Fieldstaff::where('kantah_id', Kantah::getUser()->id)->get();
            $data['laporan'] = Report::whereIn('fieldstaff_id', function ($q) {
                $q->from('fieldstaffs')->select('id')->where('kantah_id', User::getUser()->id);
            })->orderBy('created_at', 'desc')->get();
            $totalTarget = Fieldstaff::where('kantah_id', Kantah::getUser()->id)->sum('target');
            $tahapan = Stages::whereIn('fieldstaff_id', function ($q) {
                $q->from('fieldstaffs')->select('id')->where('kantah_id', User::getUser()->id);
            })->get();
            if ($totalTarget > 0) {
                $data['persenPenyuluhan'] = $tahapan->sum('penyuluhan') / $totalTarget * 100;
                $data['persenPemetaan'] = $tahapan->sum('pemetaan_sosial') / $totalTarget * 100;
                $data['persenPenyusunanModel'] = $tahapan->sum('penyusunan_model') / $totalTarget * 100;
                $data['persenPendampingan'] = $tahapan->sum('pendampingan') / $totalTarget * 100;
                $data['persenPenyusunanData'] = $tahapan->sum('penyusunan_data') / $totalTarget * 100;
                foreach ($data['fieldstaff'] as $field) {
                    $field->load('Tahapan');
                    $totalTarget = $field->target * 5;
                    $totalKinerja = $field->Tahapan->penyuluhan + $field->Tahapan->pemetaan_sosial + $field->Tahapan->penyusunan_model + $field->Tahapan->pendampingan + $field->Tahapan->penyusunan_data;
                    $kinerja = $totalKinerja / $totalTarget * 100;
                    $ranking[] = [
                        'name' => $field->name, 'progress' => $kinerja
                    ];
                }
                array_multisort(array_column($ranking, "progress"), SORT_DESC, $ranking);
                $collectRanking = collect($ranking);
            } else {
                $data['persenPenyuluhan'] = 0;
                $data['persenPemetaan'] = 0;
                $data['persenPenyusunanModel'] = 0;
                $data['persenPendampingan'] = 0;
                $data['persenPenyusunanData'] = 0;
                $collectRanking = collect($ranking);
            }
            return view('kantah.index', ['ranking' => $collectRanking])->with($data);
        } else if (Auth::User()->level == 3) {
            $fieldstaff = Fieldstaff::with('Tahapan')->where('user_id', Auth::User()->id)->first();
            $data['totalLaporan'] = Report::where('fieldstaff_id', $fieldstaff->id)->get();
            $data['laporanKeluhan'] = Report::where('fieldstaff_id', $fieldstaff->id)->whereNotNull('keluhan')->where('keluhan', '!=', '')->get();
            $data['laporanSaran'] = Report::where('fieldstaff_id', $fieldstaff->id)->whereNotNull('saran')->where('saran', '!=', '')->get();
            $data['tanggal_akhir'] = Report::where('fieldstaff_id', $fieldstaff->id)->orderBy('created_at', 'desc')->first();
            if (!empty($fieldstaff->Tahapan)) {
                $data['persenPenyuluhan'] = $fieldstaff->Tahapan->penyuluhan / $fieldstaff->target * 100;
                $data['persenPemetaan'] = $fieldstaff->Tahapan->pemetaan_sosial / $fieldstaff->target * 100;
                $data['persenPenyusunanModel'] = $fieldstaff->Tahapan->penyusunan_model / $fieldstaff->target * 100;
                $data['persenPendampingan'] = $fieldstaff->Tahapan->pendampingan / $fieldstaff->target * 100;
                $data['persenPenyusunanData']  = $fieldstaff->Tahapan->penyusunan_data / $fieldstaff->target * 100;
            } else {
                $data['persenPenyuluhan'] = 0;
                $data['persenPemetaan'] = 0;
                $data['persenPenyusunanModel'] = 0;
                $data['persenPendampingan'] = 0;
                $data['persenPenyusunanData']  = 0;
            }
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
        } else if ($id->level == 2) {
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
        } else if ($id->level == 1) {
            $validated = $request->validate([
                'name' => 'required',
                'email' => 'required',
                'head_name' => 'required',
                'nip_head_name' => 'required'
            ]);
            $kanwil = Kanwil::where('user_id', $id->id)->first();

            $updateData = $kanwil->update($validated);
            if ($updateData) {
                return back()->with('success', 'Data berhasil diupdate');
            }
        }
    }

    public function updateAkun(UpdateAkunRequest $request, User $id)
    {
        $validated = $request->validated();
        if ($validated['password_lama'] != $id->password) {
            return back()->with('error', 'Password Lama tidak sesuai');
        }

        $data['username'] = $validated['username'];
        if ($validated['password'] != '') {
            $data['password'] = $validated['password'];
        }
        $update = $id->update($data);
        if ($update) {
            return back()->with('success', 'Data berhasil diupdate');
        }
    }
}
