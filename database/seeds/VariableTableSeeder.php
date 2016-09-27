<?php

use Illuminate\Database\Seeder;

class VariableTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('variables')->insert([
          'nombre'=>'Temperatura',
          'unidad_de_medida'=>'°C'
        ]);
        DB::table('variables')->insert([
          'nombre'=>'Humedad',
          'unidad_de_medida'=>'%'
        ]);
        DB::table('variables')->insert([
          'nombre'=>'PH',
          'unidad_de_medida'=>'%'
        ]);
    }
}
