<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableUtilisateur extends Migration
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
            $table->enum('gender',['man','woman','unspecified'])->nullable();
            $table->string('lastname',100);
            $table->string('firstname',100);
            $table->string('email', 191)->unique();
            $table->string('phone',15)->nullable();
            $table->string('pwd');
            $table->string('notes')->nullable();
            $table->unsignedBigInteger('companies')->nullable();


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
