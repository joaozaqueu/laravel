@extends('admin.layouts.dashboard')

@section('section')
@include('admin.helpers.modal_cliente')

<div class="row">
  <div class="col-sm-12">
    @component('admin.widgets.panel')
    @slot('panelTitle', 'Painel de Vendas')
    @slot('panelBody')
    @if( isset($venda) )
    <form action="{{route('vendas.update', $venda->id)}}" method="post" role="form">
      {{ method_field('PUT') }}
      @else
      <form action="{{route('vendas.store')}}" method="post" role="form">
        @endif
        {{ csrf_field() }}
        <div class="col-md-12 margin-bottom-20">
          <div class="col-md-7 margin-bottom-20">
            <div class="form-group col-lg-12">
              
              <select id="sel" class="form-control" style="height: 50px; font-size: 20px;" value="{{$vendas->produtos->nome or old('nome')}}">
                @foreach($vendas as $venda)
                <option>Selecione o Produto</option>
                @foreach($venda->produtos as $produto)
                <option value=" {{$procuto->nome}} "> {{$procuto->nome}} </option>
                @endforeach
                @endforeach
              </select>
              
            </div>
            <div class="form-group col-md-12">
              <h4>Quantidade:</h4>
              <input type="text" class="form-control" style="height: 50px;" value="{{$vendas->produtos->quantidade or old('quantidade')}}">
            </div>
            <div class="form-group col-md-12">
              <button class="btn btn_adiciona">Adicionar Produto</button>
            </div>
          </div>      
          <div class="col-md-5">
            <div class="cliente">
              <p>CLIENTE</p>
              <p>Nome: <a data-delete="" data-toggle="modal" data-target="#cliente-modal" class="">Cliente</a></p>
            </div>
            <div class="col-md-12">
              <table class="table">
                <tr>
                  <th>Qtd.</th>
                  <th>Produto</th>
                  <th>Preço</th>
                </tr>
                <tr>
                  <td>John</td>
                  <td>john@gmail.com</td>
                  <td>London, UK</td>
                  <td>
                    <a href="#" class="btn btn-success" ><i class="fa fa-pencil"></i></a>
                  </td>
                </tr>
              </table>
            </div>
            <h4>TOTAL DO PEDIDO</h4>
            <div class="total">
              R$
            </div>
            <div class="butons">
              <button class="btn btn-danger" style="margin-right: 15px;">Cancelar Venda</button>
              <button class="btn btn-primary">Finalizar Venda</button>
            </div>
          </div>
        </form>
        @endslot
        @endcomponent
      </div>

      <!-- 
      <div class="col-sm-12">
        @component('admin.widgets.panel')
        @slot('panelTitle', 'Vendas Rencentes')
        @slot('panelBody')
        <table class="table">
          <thead>
            <tr>
              <th>Nome do Cliente</th>
              <th>Itens Venda</th>
              <th>Valor</th>
              <th>Data da Venda</th>
              <th>Ação</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>John</td>
              <td>john@gmail.com</td>
              <td>London, UK</td>
              <td>25/05/2017</td>
              <th>
                <a href="#" class="btn btn-success"><i class="fa fa-money"> Receber</i></a>
              </th>
            </tr>
          </tbody>
        </table>
        @endslot
        @endcomponent
      </div>
    </div> -->
    @endsection