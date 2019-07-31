<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('titulo');

            $table->longText('descripcion');

            $table->string('modulo');

            $table->string('estado');

            $table->unsignedBigInteger("proyecto");
            $table->foreign("proyecto")->references("id")->on("proyectos");

            $table->unsignedBigInteger("usuario");
            $table->foreign("usuario")->references("id")->on("users");

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
        Schema::dropIfExists('reportes');
    }
}
