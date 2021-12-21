<?php

namespace App\Models;

use App\Http\Controllers\FieldstaffController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kantah extends Model
{
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
}
