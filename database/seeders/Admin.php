<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class Admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'roles_id' => '1',
            'nama' => 'Bagus Cahyo S',
            'kelamin' => 'Laki-laki',
            'alamat' => 'Jl. Sawo Bringin',
            'no_telp' => '0812900191232',
            'email' => 'bagus@gmail.com',
        ]); 
    }
}
