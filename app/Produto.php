<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'nome', 'preco', 'categoria', 
    ];

    public function format_Preco (\Decimal $preco){
    	return $preco->number_format($number, 2, ',', '.');
    }

    public function vendas()
    {
        return $this->belongsToMany(Venda::class, 'Vendas_has_Produto', 'Produto_id', 'Venda_id')
            ->withPivot('quantidade','preco');
    }
}
