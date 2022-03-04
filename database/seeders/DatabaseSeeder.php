<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Kantah;
use App\Models\Kanwil;
use App\Models\Stages;
use App\Models\Fieldstaff;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'kanwil',
            'password' => 'kanwil', // password
            'level' => 1,
        ]);

        User::create([
            'username' => 'kantah',
            'password' => 'kantah', // password
            'level' => 2,
        ]);

        User::create([
            'username' => 'fieldstaff',
            'password' => 'fieldstaff', // password
            'level' => 3,
        ]);

        Kanwil::create([
            'name' => 'kanwil',
            'user_id' => 1,
            'email' => 'kanwil@gmail.com',
            'head_name' => 'Kanwil',
            'nip_head_name' => '99999999'
        ]);

        Kantah::create([
            'name' => 'KANTAH PERTANAHAN UTARA',
            'user_id' => 2,
            'email' => 'kantah@gmail.com',
            'head_name' => 'Jajang Setiawan',
            'nip_head_name' => '190613011',
            'kanwil_id' => 1,
        ]);

        Fieldstaff::create([
            'name' => 'Robby Gustian',
            'date_born' => '2001-11-11',
            'alamat' => 'Di Rumah',
            'phone_number' => '089636466772',
            'target' => 50,
            'user_id' => 3,
            'kantah_id' => 1,
        ]);

        Stages::create([
            'penyuluhan' => 0,
            'pemetaan_sosial' => 0,
            'penyusunan_model' => 0,
            'pendampingan' => 0,
            'penyusunan_data' => 0,
            'fieldstaff_id' => 1,
        ]);
    }
}
