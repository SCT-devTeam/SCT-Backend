<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableContact extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('gender',['man','woman','unspecified']);
            $table->string('firstname');
            $table->string('lastname');
            $table->string('job');
            $table->string('email');
            $table->integer('phone_mobile');
            $table->integer('phone_fix');
            $table->integer('phone_personnal');
            $table->integer('phone_fax');
            $table->string('notes',300);
            $table->unsignedBigInteger('customer');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
