<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePessoaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pessoa', function (Blueprint $table) {
            $table->string('nome', 60); 
            $table->date('data_nascimento')->nullable();

            $table->string('genitor', 60)->nullable(); 
            $table->string('cpf_genitor', 11)->nullable();
            $table->string('contato_genitor', 10)->nullable(); 
            $table->string('rg_genitor')->nullable();

            $table->string('genitora', 60)->nullable(); 
            $table->string('cpf_genitora', 11)->nullable();
            $table->string('contato_genitora', 10)->nullable();
            $table->string('rg_genitora')->nullable();

            $table->string('responsavel', 60);
            $table->string('cpf_responsavel', 11); 
            $table->string('contato_responsavel', 10); 
            $table->string('rg_responsavel')->nullable();
        
            $table->string('endereco', 45);
            $table->string('complemento', 45)->nullable();
            $table->string('estado', 10);
            $table->string('cidade', 10);

            $table->enum('ori_denuncia',['local','tel','mp','je'])->default('local');

            $table->string('denunciante')->nullable();
            $table->string('contato_denunciante')->nullable();
            $table->string('cpf_denunciante')->nullable();
            $table->string('rg_denunciante')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pessoa', function (Blueprint $table) {
            
            $table->dropColumn('nome'; 
            $table->dropColumn('genitor'); 
            $table->dropColumn('genitora'); 
            $table->dropColumn('responsavel');
            $table->dropColumn('data_nascimento');
            $table->dropColumn('cpf_genitor');
            $table->dropColumn('cpf_genitora');
            $table->dropColumn('cpf_responsavel'); 
            $table->dropColumn('contato_genitor'); 
            $table->dropColumn('contato_genitora'); 
            $table->dropColumn('contato_responsavel'); 
            $table->dropColumn('endereco');
            $table->dropColumn('complemento');
            $table->dropColumn('estado');
            $table->dropColumn('cidade');
            $table->dropColumn('ori_denuncia',['local','tel','mp','je']);
            $table->dropColumn('denunciante');
            $table->dropColumn('contato_denunciante');
            $table->dropColumn('cpf_denunciante');
            $table->dropColumn('rg_denunciante');
            $table->dropColumn('rg_genitor');
            $table->dropColumn('rg_genitora');
            $table->dropColumn('rg_responsavel');
        });
    }
}
