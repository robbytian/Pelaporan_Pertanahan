<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'tanggal_laporan', 'kegiatan', 'keterangan', 'foto', 'keluhan', 'saran', 'fieldstaff_id'
    ];
    public function Fieldstaff()
    {
        return $this->belongsTo(Fieldstaff::class, 'fieldstaff_id');
    }
    public function Participant()
    {
        return $this->hasMany(Participant::class, 'laporan_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($report) {
            foreach ($report->Participant()->get() as $participant) {
                $participant->delete();
            }
        });
    }
}
