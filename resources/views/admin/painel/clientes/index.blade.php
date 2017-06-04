@extends('admin.layouts.dashboard')

@section('section')
@include('admin.helpers.modal_delete')
<div class="row">
	<div class="col-sm-12">
		@component('admin.widgets.panel')
		@slot('panelTitle', 'Lista de Clientes')
		@slot('panelBody')

		<a href="{{route('clientes.create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Adicionar</a>
		<hr>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Nome</th>
					<th>Email</th>
					<th>Telefone</th>
					<th>Documento</th>
					<th class="col-sm-3">Opção</th>
				</tr>
			</thead>
			<tbody>
				@foreach($clientes as $cliente)
				<tr class="info">
					<td> {{$cliente->nome}} </td>
					<td> {{$cliente->email}} </td>
					<td> {{$cliente->telefone}} </td>
					<td> {{$cliente->documento}} </td>
					<td>
						<a href="{{route('clientes.edit', $cliente->id)}}" class="btn btn-primary"><i class="fa fa-pencil"></i> Editar</a>
						<a href="{{route('clientes.show', $cliente->id)}}" class="btn btn-success"><i class="fa fa-eye"></i> View</a>
						<a data-delete="{{route('clientes.destroy', $cliente->id)}}" data-toggle="modal" data-target="#delete-modal" class="btn btn-danger"><i class="fa fa-trash-o"></i> Excluir</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{!! $clientes->links() !!}
		@endslot
		@endcomponent
	</div>
	<!-- /.col-sm-6 -->
</div>

<!-- /.row -->
@endsection
