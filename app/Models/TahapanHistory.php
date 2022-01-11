<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahapanHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'fieldstaff_id', 'tahapan', 'jumlah'
    ];
}
