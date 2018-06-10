<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAndamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('andamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('descricao', 500);
            $table->timestamps('data_hora');

            $table->unsignedInteger('status_id');
            $table->foreign('status_id')->references('id')->on('status');

            $table->unsignedInteger('registro_atendimento_id');
            $table->foreign('registro_atendimento_id')->references('id')->on('registro_atendimento');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('andamentos');
    }
}
