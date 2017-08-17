<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tareas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',40);
            $table->text('descripcion')->nullable();
            $table->boolean('realizada');
            $table->unsignedInteger('invernadero');
            $table->unsignedInteger('responsable');
            $table->string('image_path')->nullable();
            $table->foreign('invernadero')->references('id')->on('invernaderos');
            $table->foreign('responsable')->references('id')->on('users');
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
        Schema::dropIfExists('tareas');
    }
}
