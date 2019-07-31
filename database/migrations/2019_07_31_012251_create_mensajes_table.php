<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensajes', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->unsignedBigInteger("id_proyecto");
            $table->foreign("id_proyecto")->references("id")->on("proyectos");

            $table->unsignedBigInteger("remitente");
            $table->foreign("remitente")->references("id")->on("users");



            $table->text('mensaje');

            $table->date('fecha');
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
        Schema::dropIfExists('mensajes');
    }
}
