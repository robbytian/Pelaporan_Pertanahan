<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TahapanHistory extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'fieldstaff_id', 'tahapan', 'jumlah'
    ];

    public function Fieldstaff()
    {
        return $this->belongsTo(Fieldstaff::class, 'fieldstaff_id');
    }
}
