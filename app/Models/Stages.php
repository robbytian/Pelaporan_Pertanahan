<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stages extends Model
{
    use HasFactory;
    protected $fillable = [
        'pemetaan', 'penyusunan', 'penyuluhan', 'pendampingan', 'evaluasi', 'fieldstaff_id'
    ];

    public function Fieldstaff()
    {
        return $this->belongsTo(Fieldstaff::class, 'fieldstaff_id');
    }
}
