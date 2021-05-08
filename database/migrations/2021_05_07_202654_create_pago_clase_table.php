<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagoClaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pago_clase', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_pago');
            $table->integer('id_clase')->unsigned()->nullable();
            $table->integer('idc')->unsigned()->nullable();
            $table->integer('idu')->unsigned()->nullable();
            $table->foreign('id_clase')->references('id')->on('clases')->onDelete('set null');
            $table->foreign('idc')->references('id')->on('clientes')->onDelete('set null');
            $table->foreign('idu')->references('id')->on('usuarios')->onDelete('set null');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pago_clase');
    }
}
