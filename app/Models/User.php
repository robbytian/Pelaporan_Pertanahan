<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'username',
        'password',
        'level',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Kantah()
    {
        return $this->hasOne(Kantah::class, 'user_id');
    }

    public function Kanwil()
    {
        return $this->hasOne(Kanwil::class, 'user_id');
    }

    public function Fieldstaff()
    {
        return $this->hasOne(Fieldstaff::class, 'user_id');
    }

    public static function getUser()
    {
        if (Auth::User()->level == 1) {
            $user = Kanwil::where('user_id', Auth::User()->id)->first();
        } else if (Auth::User()->level == 2) {
            $user = Kantah::where('user_id', Auth::User()->id)->first();
        } else if (Auth::User()->level == 3) {
            $user = Fieldstaff::where('user_id', Auth::User()->id)->first();
        }
        return $user;
    }
}
