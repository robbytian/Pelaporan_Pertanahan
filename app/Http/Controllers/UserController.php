<?php

namespace App\Http\Controllers;

use App\Models\Fieldstaff;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {

        if (Auth::User()->level == 1) {
            return view('kanwil.index');
        } else if (Auth::User()->level == 2) {
            return view('kantah.index');
        } else if (Auth::User()->level == 3) {
            $fieldstaff = Fieldstaff::where('user_id', Auth::User()->id)->first();
            $data['totalLaporan'] = Report::where('fieldstaff_id', $fieldstaff->id)->get();
            $data['laporanKeluhan'] = Report::where('fieldstaff_id', $fieldstaff->id)->whereNotNull('keluhan')->where('keluhan', '!=', '')->get();
            $data['laporanSaran'] = Report::where('fieldstaff_id', $fieldstaff->id)->whereNotNull('saran')->where('saran', '!=', '')->get();
            $data['tanggal_akhir'] = Report::where('fieldstaff_id', $fieldstaff->id)->orderBy('created_at')->first();
            return view('fieldstaff.index')->with($data);
        }
    }
}
