<?php

use Illuminate\Database\Seeder;

class LecturaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lecturas')->insert([
          'invernadero'=>1,
          'variable'=>1,
          'valor'=>35,
          'created_at'=>'2016-09-28 09:00',
        ]);
        DB::table('lecturas')->insert([
          'invernadero'=>1,
          'variable'=>1,
          'valor'=>30,
          'created_at'=>'2016-09-28 10:00',
        ]);
        DB::table('lecturas')->insert([
          'invernadero'=>1,
          'variable'=>1,
          'valor'=>37,
          'created_at'=>'2016-09-28 11:00',
        ]);
        DB::table('lecturas')->insert([
          'invernadero'=>1,
          'variable'=>1,
          'valor'=>42,
          'created_at'=>'2016-09-28 12:00',
        ]);
        DB::table('lecturas')->insert([
          'invernadero'=>1,
          'variable'=>1,
          'valor'=>38,
          'created_at'=>'2016-09-28 13:00',
        ]);
        DB::table('lecturas')->insert([
          'invernadero'=>1,
          'variable'=>1,
          'valor'=>45,
          'created_at'=>'2016-09-28 14:00',
        ]);

        //Data humedad
        DB::table('lecturas')->insert([
          'invernadero'=>1,
          'variable'=>2,
          'valor'=>75,
          'created_at'=>'2016-09-28 09:00',
        ]);
        DB::table('lecturas')->insert([
          'invernadero'=>1,
          'variable'=>2,
          'valor'=>80,
          'created_at'=>'2016-09-28 10:00',
        ]);
        DB::table('lecturas')->insert([
          'invernadero'=>1,
          'variable'=>2,
          'valor'=>87,
          'created_at'=>'2016-09-28 11:00',
        ]);
        DB::table('lecturas')->insert([
          'invernadero'=>1,
          'variable'=>2,
          'valor'=>92,
          'created_at'=>'2016-09-28 12:00',
        ]);
        DB::table('lecturas')->insert([
          'invernadero'=>1,
          'variable'=>2,
          'valor'=>88,
          'created_at'=>'2016-09-28 13:00',
        ]);
        DB::table('lecturas')->insert([
          'invernadero'=>1,
          'variable'=>2,
          'valor'=>95,
          'created_at'=>'2016-09-28 14:00',
        ]);

    }
}
