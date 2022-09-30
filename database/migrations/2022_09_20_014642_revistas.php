<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revistas', function (Blueprint $table) {            
            $table->bigIncrements('id');
            $table->string('titulo');
            $table->unsignedBigInteger('tipo_id');
            $table->date('fecha');
            $table->unsignedSmallInteger('num_paginas');
            $table->unsignedSmallInteger('num_ejemplares');
            $table->foreign('tipo_id')->references('id')->on('tipos')->onDelete('cascade');
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
        //
    }
};
