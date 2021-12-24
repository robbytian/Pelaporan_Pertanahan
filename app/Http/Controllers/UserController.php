<?php

namespace App\Http\Controllers;

use App\Models\Kantah;
use App\Models\Report;
use App\Models\Fieldstaff;
use App\Models\Stages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            $fieldstaff = Fieldstaff::where('user_id', Auth::User()->id)->first();
            $tahapan = Stages::where('fieldstaff_id', $fieldstaff->id)->fisrt();
            $data['totalLaporan'] = Report::where('fieldstaff_id', $fieldstaff->id)->get();
            $data['laporanKeluhan'] = Report::where('fieldstaff_id', $fieldstaff->id)->whereNotNull('keluhan')->where('keluhan', '!=', '')->get();
            $data['laporanSaran'] = Report::where('fieldstaff_id', $fieldstaff->id)->whereNotNull('saran')->where('saran', '!=', '')->get();
            $data['tanggal_akhir'] = Report::where('fieldstaff_id', $fieldstaff->id)->orderBy('created_at', 'desc')->first();
            $data['persenPemetaan'] = $tahapan->pemetaan / $fieldstaff->target * 100;
            $data['persenPenyuluhan'] = $tahapan->penyuluhan / $fieldstaff->target * 100;
            $data['persenPenyusunan'] = $tahapan->penyusunan / $fieldstaff->target * 100;
            $data['persenPendampingan'] = $tahapan->pendampingan / $fieldstaff->target * 100;
            $data['persenEvaluasi'] = $tahapan->evaluasi / $fieldstaff->target * 100;
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
}
