<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fieldstaff extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'date_born', 'alamat', 'phone_number', 'target', 'user_id', 'kantah_id'
    ];

    public function Kantah()
    {
        return $this->belongsTo(Kantah::class, 'kantah_id');
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
}
