<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeccionesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('secciones', function (Blueprint $table) {
            $table->increments('id');
            $table->foreing('user_id')->references('id')->on('users');
            $table->string('titulo', 255);
            $table->string('descripcionC', 255);
            $table->text('DescripcionL');
            $table->string('icono', 255);
            $table->string('metadesc', 255);
            $table->string('metatitle', 255);
            $table->string('metakey', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('secciones', function (Blueprint $table) {
            Schema::drop('secciones');
        });
    }

}
