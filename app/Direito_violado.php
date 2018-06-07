<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direito_violado extends Model
{
    //protected $table="direito_violado";

    protected $fillable = [
    	'vida',
    	'saude',
    	'liberdade',
    	'respeito',
    	'dignidade',
    	'familiar',
    	'comunitario',
    	'educacao',
    	'cultura',
    	'esporte',
    	'lazer',
    	'profissional',
        'protecao_no_trabalho',
    	'observacao'
    ];

    public function registro_atendimento(){
    	return $this->belongsToMany(Registro_atendimento::class);
    }
}
