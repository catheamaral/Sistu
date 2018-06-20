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
            
            $table->string('descricao');
        });

        DB::table('status')->insert(
            array(
                'id' => 1,
                'descricao' => 'Enviado para conselheiro'
            )
        );
        DB::table('status')->insert(
            array(
                'id' => 2,
                'descricao' => 'Aceito pelo conselheiro'
            )
        );
        DB::table('status')->insert(
            array(
                'id' => 3,
                'descricao' => 'Recusado pelo conselheiro'
            )
        );
        DB::table('status')->insert(
            array(
                'id' => 4,
                'descricao' => 'Enviado para o colegiado'
            )
        );
        DB::table('status')->insert(
            array(
                'id' => 5,
                'descricao' => 'Aceito pelo Colegiado'
            )
        );
        DB::table('status')->insert(
            array(
                'id' => 6,
                'descricao' => 'Recusado pelo conselheiro'
            )
        );
        DB::table('status')->insert(
            array(
                'id' => 7,
                'descricao' => 'Documento Gerado'
            )
        );
        DB::table('status')->insert(
            array(
                'id' => 8,
                'descricao' => 'Documento Anexado'
            )
        );
        DB::table('status')->insert(
            array(
                'id' => 9,
                'descricao' => 'Processo finalizado'
            )
        );
        DB::table('status')->insert(
            array(
                'id' => 10,
                'descricao' => 'Processo Editado'
            )
        );
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
