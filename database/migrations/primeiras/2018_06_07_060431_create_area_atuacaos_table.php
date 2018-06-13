<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaAtuacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_atuacao', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('atuacao');
        });

        DB::table('area_atuacao')->insert(
            array(
                'id' => 1,
                'atuacao' => '1º Conselho Tutelar'
            )
        );
        DB::table('area_atuacao')->insert(
            array(
                'id' => 2,
                'atuacao' => '2º Conselho Tutelar'
            )
        );
        DB::table('area_atuacao')->insert(
            array(
                'id' => 3,
                'atuacao' => '3º Conselho Tutelar'
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
        Schema::dropIfExists('area_atuacaos');
    }
}
