<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuestionariosSaludTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuestionarios_salud', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idc')->unsigned();
            $table->boolean('enfermedad_cronica')->default(false);
            $table->boolean('enfermedad_respiratoria')->default(false);
            $table->boolean('impedimento_fisico')->nullable()->default(false);
            $table->boolean('enfermedad_cardiovascular')->default(false);
            $table->boolean('lesion_muscular')->default(false);
            $table->boolean('lesion_osea')->default(false);
            $table->string('estado_salud', 20)->nullable();
            $table->foreign('idc')->references('id')->on('clientes')->onDelete('cascade');
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
        Schema::dropIfExists('cuestionarios_salud');
    }
}
