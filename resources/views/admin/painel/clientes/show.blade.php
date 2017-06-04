@extends('admin.layouts.dashboard')

@section('section')
<a href="{{route('clientes.index')}}" class="btn btn-default"><i class="fa fa-reply"> Voltar</i></a> 
<hr>
<div class="row">
	<div class="col-sm-4">
		@component('admin.widgets.panel')
		@slot('panelTitle', 'Dados do Cliente')
		@slot('panelBody')
		<div class="dados">
			<h5><strong>Nome:</strong> {{$cliente->nome}} </h5>
			<hr>
			<h5><strong>E-mail:</strong> {{$cliente->email}} </h5>
			<hr>
			<h5><strong>Telefone:</strong> {{$cliente->telefone}} </h5>
			<hr>
			<h5><strong>Documento:</strong> {{$cliente->documento}} </h5>
			<hr>
		</div>
		@endslot
		@endcomponent
	</div>
	<div class="col-sm-8">
		@component('admin.widgets.panel')
		@slot('panelTitle', 'Lista de Gastos do Mês')
		@slot('panelBody')
		<div class="text-center"><h4>Eight</h4></div>
		@endslot
		@endcomponent
	</div>
</div>

@endsection