<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_laporan', 'kegiatan', 'keterangan', 'foto', 'keluhan', 'saran', 'fieldstaff_id', 'peserta'
    ];
    public function Fieldstaff()
    {
        return $this->belongsTo(Fieldstaff::class, 'fieldstaff_id');
    }
}
