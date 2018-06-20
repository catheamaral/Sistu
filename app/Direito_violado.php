<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direito_violado extends Model
{
    protected $table="direito_violado";

    protected $fillable = [
    	'vida',
    	'saude',
        'freedom',
        'respect',
		'dig',       
		'ConvF',
        'ConvComunitaria',
        'educacao',
        'cultura',
        'esporte',
        'lazer',
        'profissa',
        'proTraba',
        'pro',
    ];

    public function registro_atendimento(){
    	return $this->belongsToMany(Registro_atendimento::class);
    }
}
