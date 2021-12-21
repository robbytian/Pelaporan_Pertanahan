<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
