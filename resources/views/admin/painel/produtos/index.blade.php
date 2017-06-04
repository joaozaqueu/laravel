@extends('admin.layouts.dashboard')

@section('section')
@include('admin.helpers.modal_delete')
<div class="row">
	<div class="col-sm-12">
		@component('admin.widgets.panel')
		@slot('panelTitle', 'Lista de Produtos')
		@slot('panelBody')

		<a href="{{route('produtos.create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Adicionar</a>
		<hr>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Nome</th>
					<th>Preço</th>
					<th>Categoria</th>
					<th class="col-sm-3">Opção</th>
				</tr>
			</thead>
			<tbody>
				@foreach($produtos as $produto)
				<tr class="info">
					<td> {{$produto->nome}} </td>
					<td> {{$produto->preco}} </td>
					<td> {{$produto->categoria}} </td>
					<td>
					<a href="{{route('produtos.edit', $produto->id)}}" class="btn btn-primary"><i class="fa fa-pencil"></i> Editar</a>
					<a data-delete="{{route('produtos.destroy', $produto->id)}}" data-toggle="modal" data-target="#delete-modal" class="btn btn-danger"><i class="fa fa-trash-o"></i> Excluir</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{!! $produtos->links() !!}
		@endslot
		@endcomponent
	</div>
	<!-- /.col-sm-6 -->
</div>
<!-- /.row -->


@endsection
