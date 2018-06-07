<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro_atendimento extends Model
{
    //protected $table="registro_atendimento";

    protected $fillable = [

        'local'
    	
    ];

    public function agente_violador(){
    	return $this->belongsToMany(Agente_violador::class);
    }

    public function direito_violado(){
    	return $this->belongsToMany(Direito_violado::class);
    }
}
