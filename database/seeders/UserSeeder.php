<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'cobas',
            'name' => 'David Cobas',
            'location' => 'Toledo',
            'email' => 'correo@correo.es',
            'passwd' => '827ccb0eea8a706c4c34a16891f84e7b', //12345
            'active' => 1
        ]);
    }
}
