<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistroAtendimentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_atendimento', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('local', 50)->nullable();

            $table->unsignedInteger('funcionario_id');
            $table->foreign('funcionario_id')->references('id')->on('funcionario');

            $table->unsignedInteger('pessoa_id');
            $table->foreign('pessoa_id')->references('id')->on('pessoa');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registro_atendimento');
    }
}
