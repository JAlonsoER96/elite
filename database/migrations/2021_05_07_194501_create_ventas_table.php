<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('monto');
            $table->dateTimeTz('fecha_venta');
            $table->integer('idv')->unsigned()->nullable();
            $table->integer('idc')->unsigned()->nullable();
            $table->integer('idu')->unsigned()->nullable();
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
        Schema::dropIfExists('ventas');
    }
}
