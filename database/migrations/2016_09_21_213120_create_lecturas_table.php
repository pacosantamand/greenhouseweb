<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLecturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecturas', function (Blueprint $table) {
           // $table->increments('id');
            $table->unsignedInteger('invernadero');
            $table->unsignedInteger('variable');
            $table->primary(['invernadero','variable']);
            $table->float('valor');
            $table->foreign('invernadero')->references('invernadero_id')->on('invernadero_variable');
            $table->foreign('variable')->references('variable_id')->on('invernadero_variable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lecturas');
    }
}
