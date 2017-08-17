<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvernaderosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invernaderos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',40);
            $table->text('descripcion');
            $table->double('latitud')->default(18.354048);
            $table->double('longitud')->default(-95.811183);
            $table->unsignedInteger('responsable')->unique();
            $table->foreign('responsable')->references('id')->on('users')->onDelete('cascade');;
            $table->timestamps();
        });

        Schema::create('invernadero_variable', function(Blueprint $table){
            $table->unsignedInteger('invernadero_id')->index();
            $table->unsignedInteger('variable_id')->index();
            $table->foreign('invernadero_id')->references('id')->on('invernaderos')->onDelete('cascade');
            $table->foreign('variable_id')->references('id')->on('variables')->onDelete('cascade');
            $table->primary(['invernadero_id','variable_id']);
            $table->timestamps();

        });

        Schema::create('invernadero_user', function(Blueprint $table){
            $table->unsignedInteger('invernadero_id')->index();
            $table->unsignedInteger('user_id')->index();
            $table->foreign('invernadero_id')->references('id')->on('invernaderos')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');;
            $table->primary(['invernadero_id','user_id']);
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
        Schema::dropIfExists('invernadero_user');
        Schema::dropIfExists('invernadero_variable');
        Schema::dropIfExists('invernaderos');
    }
}
