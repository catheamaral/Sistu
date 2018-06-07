<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->enum('descricao',['Enviado para conselheiro',
                                        'Aceito pelo conselheiro',
                                        'Recusado pelo conselheiro',
                                        'Enviado para o colegiado',
                                        'Aceito pelo colegiado',
                                        'Recusado pelo colegiado',
                                        'Documento gerado',
                                        'Documento anexado',
                                        'Processo finalizado',
                                        'Processo editado']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statuses');
    }
}
