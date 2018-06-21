<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVerificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verifications', function (Blueprint $table) {
            
            $table->unsignedInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');

            $table->unsignedInteger('funcionario_t_id');
            $table->foreign('funcionario_t_id')->references('id')->on('funcionario');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('verifications');
    }
}
