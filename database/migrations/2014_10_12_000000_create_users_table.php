<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('role');
            $table->string('role2');
            $table->string('name');
            $table->string('name2');
            $table->string('surname');
            $table->string('surname2');
            $table->string('nick')->unique();
            $table->string('email')->unique();
            $table->integer('telefono');
            $table->string('password');
            $table->string('imagen');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('users');
    }

}
