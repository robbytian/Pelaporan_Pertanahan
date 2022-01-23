<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fieldstaff extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'name', 'date_born', 'alamat', 'phone_number', 'target', 'user_id', 'kantah_id', 'kanwil_id'
    ];

    public function Kantah()
    {
        return $this->belongsTo(Kantah::class, 'kantah_id');
    }

    public function Kanwil()
    {
        return $this->belongsTo(Kanwil::class, 'kanwil_id');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function Report()
    {
        return $this->hasMany(Report::class, 'fieldstaff_id');
    }

    public function Tahapan()
    {
        return $this->hasOne(Stages::class, 'fieldstaff_id');
    }

    public function Rencana()
    {
        return $this->hasMany(Plan::class, 'fieldstaff_id');
    }

    public static function getUser()
    {
        $user = Fieldstaff::where('user_id', Auth::User()->id)->first();
        return $user;
    }

    public function HistoriTahapan()
    {
        return $this->hasMany(TahapanHistory::class, 'fieldstaff_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($fieldstaff) {
            $fieldstaff->User->update(['username' => $fieldstaff->User->username . date("Ymd")]);
            $fieldstaff->User->delete();
            if (!empty($fieldstaff->Tahapan)) {
                $fieldstaff->Tahapan->delete();
            }
            foreach ($fieldstaff->Rencana()->get() as $plan) {
                $plan->delete();
            }
            foreach ($fieldstaff->Report()->get() as $report) {
                $report->delete();
            }
            foreach ($fieldstaff->HistoriTahapan()->get() as $stage) {
                $stage->delete();
            }
        });
    }
}
