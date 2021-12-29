<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plan extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'periode', 'lokasi', 'tindak_lanjut', 'fieldstaff_id'
    ];

    public function Fieldstaff()
    {
        return $this->belongsTo(Fieldstaff::class, 'fieldstaff_id');
    }
}
