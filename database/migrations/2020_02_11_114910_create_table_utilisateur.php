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
        Schema::create('utilisateur', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom_uti');
            $table->string('prenom_uti');
            $table->string('mail_uti');
            $table->integer('tel_uti');
            $table->string('pwd_uti');
            $table->boolean('est_admin');
            $table->string('note_uti');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('utilisateur');
    }
}
