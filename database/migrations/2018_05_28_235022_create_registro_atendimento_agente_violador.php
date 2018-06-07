<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistroAtendimentoAgenteViolador extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registroAtend_agenteViolador', function (Blueprint $table) {

            $table->unsignedInteger('registro_atendimento_id');
            $table->foreign('registro_atendimento_id')->references('id')->on('registro_atendimento');

            $table->unsignedInteger('agente_violador_id');
            $table->foreign('agente_violador_id')->references('id')->on('agente_violadors');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registroAtend_agenteViolador');
    }
}
