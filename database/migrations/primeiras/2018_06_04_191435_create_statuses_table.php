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
            
            $table->string('status');
        });

        DB::table('status')->insert(
            array(
                'id' => 1,
                'status' => 'Enviado para conselheiro'
            )
        );
        DB::table('status')->insert(
            array(
                'id' => 2,
                'status' => 'Aceito pelo conselheiro'
            )
        );
        DB::table('status')->insert(
            array(
                'id' => 3,
                'status' => 'Recusado pelo conselheiro'
            )
        );
        DB::table('status')->insert(
            array(
                'id' => 4,
                'status' => 'Enviado para o colegiado'
            )
        );
        DB::table('status')->insert(
            array(
                'id' => 5,
                'status' => 'Aceito pelo Colegiado'
            )
        );
        DB::table('status')->insert(
            array(
                'id' => 6,
                'status' => 'Recusado pelo conselheiro'
            )
        );
        DB::table('status')->insert(
            array(
                'id' => 7,
                'status' => 'Documento Gerado'
            )
        );
        DB::table('status')->insert(
            array(
                'id' => 8,
                'status' => 'Documento Anexado'
            )
        );
        DB::table('status')->insert(
            array(
                'id' => 9,
                'status' => 'Processo Finalizado'
            )
        );
        DB::table('status')->insert(
            array(
                'id' => 10,
                'status' => 'Processo Editado'
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
