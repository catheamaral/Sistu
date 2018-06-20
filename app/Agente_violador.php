<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agente_violador extends Model
{
    //protected $table="agente_violador";

	protected $fillable = [

    	'Estado',
    	'Sociedade',
    	'Pais',
    	'respon',
    	'Propria',
        'pro2'
    	
    ];

    public function registro_atendimento(){
    	return $this->belongsToMany(Registro_atendimento::class);
    }
}


