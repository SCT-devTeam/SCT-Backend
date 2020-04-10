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
            $table->enum('gender', ['man', 'woman', 'unspecified'])->nullable();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('job')->nullable();
            $table->string('email')->nullable();
            $table->integer('phone_mobile')->nullable();
            $table->integer('phone_fix')->nullable();
            $table->integer('phone_personnal')->nullable();
            $table->integer('phone_fax')->nullable();
            $table->string('notes', 300)->nullable();
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
