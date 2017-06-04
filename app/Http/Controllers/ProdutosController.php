<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Produto;
use App\Http\Requests\ProdutoFormRequest;

class ProdutosController extends Controller
{
   private $produto;
   private $pages = 5;

    public function __construct(Produto $produto){

        $this->produto = $produto;

    }

    public function index()
    {
        $produtos = $this->produto->paginate($this->pages);

        return view('admin.painel.produtos.index', compact('produtos'));
    }

    public function create(Request $request)
    {
        $categoria = ['alimentação', 'bebidas', 'outros'];

        if($request->isMethod('post')){

            $produto = Produto::create($request->all());
            
            return redirect()->route('produtos');
        }

        return view('admin.painel.produtos.form', compact('categoria'));
    }

    public function store(ProdutoFormRequest $request)
    {
            $dataForm = $request->all();

            $insert = $this->produto->create($dataForm);

        if( $insert )
            return redirect()->route('produtos.index');
        else
            return view('produtos.create');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $categoria = ['alimentação', 'bebidas', 'outros'];

        $produto = $this->produto->find($id);
      
        return view('admin.painel.produtos.form', compact('produto', 'categoria'));
    }

    public function update(ProdutoFormRequest $request, $id)
    {
        $dataForm = $request->all();

        $produto = $this->produto->find($id);

        $update = $produto->update($dataForm);

        if( $update )
            return redirect()->route('produtos.index');
        else
            return redirect()->route('produtos.edit', $id)->with(['errors' => 'Falha ao Editar']);
    }

    public function destroy($id)
    {
        $produto = $this->produto->find($id);

        $produto->delete();

        return redirect()->route('produtos.index');
    }
}

