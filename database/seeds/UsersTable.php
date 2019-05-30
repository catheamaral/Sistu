<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UsersTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nome' => 'teste',
            'email' => 'teste@teste.com',
            'password' => bcrypt('123456'),
            'perfil_id' => '3',
        ]);
    }
}
