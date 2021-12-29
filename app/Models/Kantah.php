<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Controllers\FieldstaffController;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kantah extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'name', 'user_id', 'email', 'head_name', 'nip_head_name', 'kanwil_id',
    ];

    public function Kanwil()
    {
        return $this->belongsTo(Kanwil::class, 'kanwil_id');
    }

    public function Fieldstaff()
    {
        return $this->hasMany(Fieldstaff::class, 'kantah_id');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function getUser()
    {
        $user = Kantah::where('user_id', Auth::User()->id)->first();
        return $user;
    }
}
