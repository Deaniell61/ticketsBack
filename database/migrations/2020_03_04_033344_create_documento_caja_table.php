<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentoCajaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documento_caja', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo')->nullable()->default(null);
            $table->string('descripcion')->nullable()->default(null);
            $table->double('debe',5,2)->nullable()->default(null);
            $table->double('haber',5,2)->nullable()->default(null);
            $table->double('plataforma',5,5)->nullable()->default(null);
            $table->double('comision',5,5)->nullable()->default(null);
            $table->double('descuento',5,2)->nullable()->default(null);
            $table->double('porcentaje_descuento',5,5)->nullable()->default(null);
            $table->double('iva',5,5)->nullable()->default(null);
            $table->double('total',5,2)->nullable()->default(null);
            $table->integer('type')->nullable()->default(1);
            $table->integer('state')->nullable()->default(1);

            $table->integer('creador')->nullable()->default(null)->unsigned();
            $table->foreign('creador')->references('id')->on('users')->onDelete('cascade');

            $table->integer('poliza_detalle')->nullable()->default(null)->unsigned();
            $table->foreign('poliza_detalle')->references('id')->on('polizas_detalle')->onDelete('cascade');

            $table->integer('caja')->nullable()->default(null)->unsigned();
            $table->foreign('caja')->references('id')->on('caja')->onDelete('cascade');

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
        Schema::dropIfExists('documento_caja');
    }
}
