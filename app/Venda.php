<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    
    protected $fillable = [
        'dataVenda', 'cliente_id'
    ];

    public function clientes(){
    	return $this->belongsToMany(Cliente::class);
    }

    public function produtos(){
    	return $this->belongsToMany(Produto::class, 'vendas_has_produto', 'venda_id', 'produto_id')
            ->withPivot('quantidade','preco');
    }

    public function soma()
    {
        return $this->belongsTo(Vendas_has_Produto::class, 'id','venda_id')
            ->selectRaw('venda_id, sum(preco*quantidade) as total')
            ->groupBy('venda_id');
    }

}
