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
            'password' => bcrypt('kanwil'), // password
            'level' => 1,
        ]);

        User::create([
            'username' => 'kantah',
            'password' => bcrypt('kantah'), // password
            'level' => 2,
        ]);

        User::create([
            'username' => 'fieldstaff',
            'password' => bcrypt('fieldstaff'), // password
            'level' => 3,
        ]);

        Kanwil::create([
            'name' => 'kanwil',
            'user_id' => 1
        ]);

        Kantah::create([
            'name' => 'kantah',
            'user_id' => 2,
            'email' => 'kantah@gmail.com',
            'head_name' => 'jajang',
            'nip_head_name' => '190613011',
            'kanwil_id' => 1,
        ]);

        Fieldstaff::create([
            'name' => 'fieldstaff',
            'date_born' => '2001-11-11',
            'alamat' => 'Di Rumah',
            'phone_number' => '089636466772',
            'target' => 50,
            'user_id' => 3,
            'kantah_id' => 1,
        ]);

        Stages::create([
            'pemetaan' => 0,
            'penyuluhan' => 0,
            'penyusunan' => 0,
            'pendampingan' => 0,
            'evaluasi' => 0,
            'fieldstaff_id' => 1,
        ]);
    }
}
