<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
    
    protected $fillable = [
        'users_id',
        'funcionario_t_id',
    ];

    public function user(){
    	return $this->belongsToMany(User::class);
    }

    public function funcionario(){
    	return $this->belongsToMany(Funcionario::class);
    }

}
