<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Andamento extends Model
{
    protected $fillable = [

    	'descricao',
    	'data_hora'
    	
    ];

    public function arquivo(){
    	return $this->belongsToMany(arquivo::class);
    }
}
