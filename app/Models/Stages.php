<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stages extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'penyuluhan', 'pemetaan_sosial', 'penyusunan_model', 'pendampingan', 'penyusunan_data', 'fieldstaff_id'
    ];

    public function Fieldstaff()
    {
        return $this->belongsTo(Fieldstaff::class, 'fieldstaff_id');
    }
}
