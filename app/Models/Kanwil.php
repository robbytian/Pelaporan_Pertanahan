<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kanwil extends Model
{
    use HasFactory;

    public function Kantah()
    {
        return $this->hasMany(Kantah::class, 'kanwil_id');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // public static function getUser()
    // {
    //     $user = Kanwil::where('user_id', Auth::User()->id)->first();
    //     return $user;
    // }
}
