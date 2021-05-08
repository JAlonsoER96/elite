<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',100);
            $table->integer('edad');
            $table->string('fecha_nacimiento', 50)->nullable();
            $table->string('sexo', 2);
            $table->string('ocupacion', 70)->nullable();
            $table->string('direccion',100);
            $table->string('telefono',20);
            $table->string('email', 100)->unique();
            $table->string('foto');
            $table->boolean('baja')->default(false);
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
        Schema::dropIfExists('clientes');
    }
}
