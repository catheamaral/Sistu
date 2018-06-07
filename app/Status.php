<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
	protected $table = 'status';

    protected $fillable = [

		'descricao'
    	
    ];

    public function andamento()
    {
        return $this->hasMany('App\Andamento');
    }
}
