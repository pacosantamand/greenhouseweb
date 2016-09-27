<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
          'name'=>'admin',
          'email'=>'ing.xavi03@gmail.com',
          'tipo'=>'administrador',
          'password'=>bcrypt('thislove'),
        ]);
        DB::table('users')->insert([
          'name'=>'nalle',
          'email'=>'nalle@mail.com',
          'tipo'=>'agronomo',
          'password'=>bcrypt('thislove'),
        ]);
        DB::table('users')->insert([
          'name'=>'pepe',
          'email'=>'pepe@mail.com',
          'tipo'=>'colaborador',
          'password'=>bcrypt('thislove'),
        ]);
    }
}
