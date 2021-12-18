<?php

namespace Database\Seeders;

use App\Models\User;
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

    }
}
