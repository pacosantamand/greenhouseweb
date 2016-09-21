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
    }
}
