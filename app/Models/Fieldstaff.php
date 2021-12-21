<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fieldstaff extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'date_born', 'alamat', 'phone_number', 'target', 'user_id', 'kantah_id'
    ];

    public function Kantah()
    {
        return $this->belongsTo(Kantah::class, 'kantah_id');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
