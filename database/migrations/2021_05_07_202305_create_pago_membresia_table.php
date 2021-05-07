<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagoMembresiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pago_membresia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pagado',2);
            $table->string('cobertura', 80);
            $table->timestampTz('fecha_pagom')->nullable();
            $table->integer('idc')->unsigned()->nullable();
            $table->integer('idm')->unsigned()->nullable();
            $table->foreign('idc')->references('id')->on('clientes')->onDelete('set null');
            $table->foreign('idm')->references('id')->on('membresias')->onDelete('set null');
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
        Schema::dropIfExists('pago_membresia');
    }
}
