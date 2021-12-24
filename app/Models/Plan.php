<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    public function Fieldstaff()
    {
        return $this->belongsTo(Fieldstaff::class, 'fieldstaff_id');
    }
}
