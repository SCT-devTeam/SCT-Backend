<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('gender',['man','woman','unspecified']);
            $table->string('lastname',100);
            $table->string('firstname',100);
            $table->string('email');
            $table->string('phone',15)->nullable();
            $table->string('pwd');
            $table->string('notes')->nullable();
            $table->unsignedBigInteger('companies');

            //setup constraint Users
            $table->foreign('companies')->references('id')->on('companies');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
