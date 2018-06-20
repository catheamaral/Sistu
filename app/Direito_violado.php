<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direito_violado extends Model
{
    //protected $table="direito_violado";

    protected $fillable = [
    	'vida',
    	'saude',
        'freedo',
        'respec',
		'dig',       
		'ConvF',
        'ConvCounitario',
        'educaco',
        'cultura',
        'esporte',
        'lazer',
        'profissa',
        'proTraba',
    ];

    public function registro_atendimento(){
    	return $this->belongsToMany(Registro_atendimento::class);
    }
}
