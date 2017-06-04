@extends('admin.layouts.dashboard')

@section('section')

<div class="row">
  <div class="col-sm-12">
    @component('admin.widgets.panel')
    @slot('panelTitle', 'Cadastro de Cliente')
    @slot('panelBody')

    <div class="col-lg-6 margin-bottom-20 col-md-offset-3">
      @if( isset($cliente) )
      <form action="{{route('clientes.update', $cliente->id)}}" method="post" role="form">
        {{ method_field('PUT') }}
        @else
        <form action="{{route('clientes.store')}}" method="post" role="form">
          @endif
          {{ csrf_field() }}
          <div class="form-group">
            <label for="nome">Nome</label>
            <input class="form-control" placeholder="Digite o Nome" name="nome" value="{{$cliente->nome or old('nome')}}"/>
            @if ($errors->has('nome'))
            <span class="help-block">
            <strong>{{ $errors->first('nome') }}</strong>
            </span>
            @endif
          </div>
          <div class="form-group">
            <label for="email">E-mail</label>
            <input class="form-control" placeholder="seuemail@email.com" name="email" value="{{$cliente->email or old('email')}}"/>
            @if ($errors->has('email'))
            <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
          </div>
          <div class="form-group">
            <label for="telefone">Telefone</label>
            <input id="sp_celphones" class="form-control" placeholder="(00) 00000-0000" name="telefone" value="{{$cliente->telefone or old('telefone')}}"/>
            <span class=""></span>
            @if ($errors->has('telefone'))
            <span class="help-block">
            <strong>{{ $errors->first('telefone') }}</strong>
            </span>
            @endif
          </div>
          <div class="form-group">
            <label for="documento">Documento</label>
            <input id="documento" class="form-control" placeholder="000.000.000-00" name="documento" value="{{$cliente->documento or old('documento')}}"/>
            @if ($errors->has('documento'))
            <span class="help-block">
            <strong>{{ $errors->first('documento') }}</strong>
            </span>
            @endif
          </div>
          <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check"> Salvar Dados</i></button>
          <a href="{{route('clientes.index')}}" class="btn btn-default"><i class="fa fa-reply"> Voltar</i></a> 
        </form>
      </div>
      @endslot
      @endcomponent
    </div>
    <!-- /.col-sm-6 -->
  </div>
  @endsection

