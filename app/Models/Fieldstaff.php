<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fieldstaff extends Model
{
    use HasFactory;

    public function Kantah(){
        return $this->belongsTo(Kantah::class,'kantah_id');
    }
}
