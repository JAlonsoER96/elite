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
            $table->string('nombre_cliente',100);
            $table->integer('edad_cliente');
            $table->string('fecha_nacimiento', 50)->nullable();
            $table->string('sexo_cliente', 2);
            $table->decimal('altura');
            $table->decimal('peso');
            $table->string('ocupacion', 70)->nullable();
            $table->string('direccion_cliente',100);
            $table->string('telefono_cliente',20);
            $table->string('correo_cliente', 100)->unique();
            $table->string('foto_cliente');
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
        Schema::dropIfExists('clientes');
    }
}
