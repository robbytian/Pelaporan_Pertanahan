<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Participant extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'nama_peserta', 'laporan_id'
    ];

    public function Report()
    {
        return $this->belongsTo(Report::class, 'laporan_id');
    }
}
