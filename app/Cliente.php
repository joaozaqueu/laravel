<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nome', 'email', 'documento', 'telefone', 'password',
    ];

    public function vendas(){
    	return $this->hasMany(Venda::class);
    }

    public function users(){
    	return $this->hasMany(User::class);
    }
}
