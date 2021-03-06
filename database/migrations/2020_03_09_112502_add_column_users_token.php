<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnUsersToken extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // adding a column in `users` table for the api login
        Schema::table('users', function ($table) {
            $table->string('api_token', 80)->after('pwd')
                ->unique()
                ->nullable()
                ->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // deleting the column

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('api_token');
        });
    }
}
