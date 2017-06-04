@extends('admin.layouts.dashboard')

@section('section')
<div class="row">
  <div class="col-sm-12">
    @component('admin.widgets.panel')
    @slot('panelTitle', 'Cadastro de Produto')
    @slot('panelBody')

    <div class="col-lg-6 margin-bottom-20 col-md-offset-3">
      @if( isset($produto) )
      <form action="{{route('produtos.update', $produto->id)}}" method="post" role="form">
        {{ method_field('PUT') }}
        @else
        <form action="{{route('produtos.store')}}" method="post" role="form">
          @endif
          {{ csrf_field() }}
          <div class="form-group">
            <label for="nome">Nome do Produto</label>
            <input class="form-control" placeholder="Digite o Nome do Produto" name="nome" value="{{$produto->nome or old('nome')}}"/>
          </div>
          <div class="form-group">
            <label for="nome">Preço do Produto</label>
            <div class="form-group input-group">
              <span class="input-group-addon">$</span>
              <input type="text" id="preco" class="form-control" placeholder="00.000,00" name="preco" value="{{$produto->format_Preco->preco or old('preco')}}"/>
            </div>
          </div>
          <div class="form-group">
            <label for="sel">Categoria do Produto</label><br>
            <select class="chosen-select" style="width:495px; height: 33px;" name="categoria" value="{{$produto->categoria or old('categoria')}}">
              <option value="">Selecione a Categoria</option>
              @foreach($categoria as $categoria)
              <option value="{{$categoria}}"
              @if( isset($produto) && $produto->categoria == $categoria )
              selected
              @endif
              >{{$categoria}}</option>
              @endforeach
            </select>
          </div>
          <button type="submit" class="btn btn-success pull-right"><i class="fa fa-send"> Enviar Dados</i></button>
          <a href="{{route('produtos.index')}}" class="btn btn-default"><i class="fa fa-fast-backward"> Voltar</i></a> 
        </form>
      </div>
      @endslot
      @endcomponent
    </div>
    <!-- /.col-sm-6 -->
  </div>
  @endsection

  @section('js')
  <script>
     var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
    });
  </script>
  @endsection