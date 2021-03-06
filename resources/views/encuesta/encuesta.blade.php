@extends('app')

@section('content')
@if (Session::has('error'))
<div class="alert alert-danger">
	<strong>Whoops!</strong> Algo salió mal.<br><br>
	{{Session::get('error')}}
</div>
@endif
<div class="container">
	<div class="row col-md-10 col-md-offset-1 custyle">
		<table class="table table-striped custab">
			<thead>
				<a href="{{ url('auth/encuesta/agregar-encuesta') }}" class="btn btn-primary btn-sm pull-right" style="margin-left: 4px;"><span class="glyphicon glyphicon-plus"></span> Agregar nueva encuesta</a>
				<tr>
					<th>Nombre</th>
					<th>Modelo</th>
					<th>Status</th>
					<th class="text-center">Acción</th>
				</tr>
			</thead>
			@if(count($encuestas)>0)
			@foreach($encuestas as $usr)
			<tr data-id="{{$usr->id}}">
				<td>{{$usr->nombre}}</td>
				<td>{{$usr->modelo}}</td>
				<td>{{$usr->status}}</td>
				<td class="text-center">
					<a href="{{ url('auth/encuesta/agregar-subdemografico/'.$usr->id)}}" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-plus"></span> Subdemografico</a>
					<a class='btn btn-info btn-xs' href="{{ url('auth/encuesta/editar-encuesta/'.$usr->id)}}" data-toggle="modal1" data-target=".bd-example-modal-sm"><span class="glyphicon glyphicon-edit"></span> Editar</a> 
					<a href="" class="btn-delete btn btn-danger btn-xs" data-toggle="modal" data-target=".bd-example-modal-sm"><span class="glyphicon glyphicon-remove"></span> Eliminar</a>
				</td>
			</tr>
			@endforeach
		</table>
	</div>
</div>


<!-- <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Eliminar encuesta</h4>
			</div>
			<div class="modal-body">
				<p>¿Está seguro que desea eliminar el cliente?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				<a href="" id="msj" class="btn-eliminar"><button type="button" class="btn btn-primary">Eliminar</button></a>
			</div>
		</div>
	</div>
</div> -->
@endif

<script>
	$(document).ready(function(){
		$('.btn-delete').click(function(){
			var confirmar = confirm("¿Está seguro que desea eliminar la encuesta?");
			if (confirmar === true) {
				var row = $(this).parents('tr');
				var id = row.data('id');
				var url = 'encuesta/eliminar-encuesta/'+id;
				$.post(url,0,function(result){
					alert(result);
					row.fadeOut();
				});
			}
		});
	});
</script>
@endsection