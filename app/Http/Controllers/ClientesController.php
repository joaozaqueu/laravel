<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cliente;
use App\Http\Requests\ClienteFormRequest;

class ClientesController extends Controller
{
    private $cliente;

    private $pages = 5;

    public function __construct(Cliente $cliente){

        $this->cliente = $cliente;

    }

    public function index()
    {
        $clientes = $this->cliente->paginate($this->pages);

        return view('admin.painel.clientes.index', compact('clientes'));
    }

    public function create(Request $request)
    {
        if($request->isMethod('post')){

            $cliente = Cliente::create($request->all());

            return redirect()->route('clientes');
        }
        return view('admin.painel.clientes.form');
    }

  
    public function store(ClienteFormRequest $request)
    {   
        $dataForm = $request->all();

        $insert = $this->cliente->create($dataForm);

        if( $insert )
            return redirect()->route('clientes.index');
        else
            return view('clientes.create');
    }

    public function show($id)
    {
        
        $cliente = $this->cliente->find($id);

        return view('admin.painel.clientes.show', compact('cliente'));
    }

    public function edit($id)
    {
        $cliente = $this->cliente->find($id);

        return view('admin.painel.clientes.form', compact('cliente'));
    }

    public function update(ClienteFormRequest $request, $id)
    {
        $dataForm = $request->all();

        $cliente = $this->cliente->find($id);

        $update = $cliente->update($dataForm);

        if( $update )
            return redirect()->route('clientes.index');
        else
            return redirect()->route('clientes.edit', $id)->with(['errors' => 'Falha ao Editar']);
    }

    public function destroy($id)
    {
        $cliente = $this->cliente->find($id);

        $delete = $cliente->delete();

        return redirect()->route('clientes.index');

    }
}