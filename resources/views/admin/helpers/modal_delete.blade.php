<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">DELETAR DADOS</h5>
			</div>
			<div class="modal-body">
			<form action="" id="form_delete" method="post" accept-charset="utf-8">
			<input type="hidden" name="_method" value="delete">
			{{ csrf_field() }}
				<button type="button" class="btn" data-dismiss="modal" aria-label="Close">
				NÃO</button>
				<button type="submit">SIM</button>			
			</form>
			</div>
		</div>
	</div>
</div>

<script>
	$(function(){

		var form_delete = $('#form_delete');

		$('#delete-modal').on('show.bs.modal', function(event){
			var target = $(event.relatedTarget);
			var action = target.data('delete');
			form_delete.attr('action', action);
		});
	});
</script>
