<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agente_violador extends Model
{
    //protected $table="agente_violador";

	protected $fillable = [

    	'estado',
    	'sociedade',
    	'pais',
    	'responsavel',
    	'propria_conduta'
    	
    ];

    public function registro_atendimento(){
    	return $this->belongsToMany(Registro_atendimento::class);
    }
}


