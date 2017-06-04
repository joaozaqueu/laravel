<div class="modal fade" id="cliente-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content" id="modal-cliente">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h5 class="modal-title" id="exampleModalLabel">SELECIONAR O CLIENTE</h5>
			</div>
			<div class="modal-body">
			@foreach($vendas as $venda)
				<select class="chosen-select" style="width:300px; height: 33px;" name="cliente" value="{{$venda->clientes->nome or old('nome')}}">
					<option value="">Selecione o Cliente</option>
					@foreach($venda->clientes as $cliente)
					<option value=" {{$cliente->nome}} "> {{$cliente->nome}} </option>
					@endforeach
				</select>
			@endforeach	
			</form>
		</div>
	</div>
</div>
</div>

<script>
	$(function(){

		var form_delete = $('#form_cliente');

		$('#cliente-modal').on('show.bs.modal', function(event){
			var target = $(event.relatedTarget);
			var action = target.data('delete');
			form_delete.attr('action', action);
		});
	});
</script>