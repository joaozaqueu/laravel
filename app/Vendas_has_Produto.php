<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendas_has_Produto extends Model
{

	protected $fillable = ['quantidade', 'preco', 'venda_id', 'produto_id',];

    public function vendas(){
    	 return $this->belongsToMany('App\Venda');
    }

    public function produtos(){
    	return $this->belongsToMany('App\Produto');
    }
}
