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
				<a href="encuesta/agregar-encuesta" class="btn btn-primary btn-sm pull-right" style="margin-left: 4px;"><span class="glyphicon glyphicon-plus"></span> Agregar nueva encuesta</a>
				<a href="encuesta/importar-encuesta" class="btn btn-primary btn-sm pull-right" style="margin-left: 4px;"> <span class="glyphicon glyphicon-plus"></span> Importar lista de encuestas</a>
				<a href="encuesta/exportar-encuestas" class="btn btn-primary btn-sm pull-right" style="margin-left: 4px;"> <span class="glyphicon glyphicon-plus"></span> Exportar lista de encuestas</a>
				<tr>
					<th>Nombre</th>
					<th>Modelo</th>
					<th>Status</th>
					<th class="text-center">Acción</th>
				</tr>
			</thead>
			@foreach($encuestas as $usr)
			<tr>
				<td>{{$usr->nombre}}</td>
				<td>{{$usr->modelo}}</td>
				<td>{{$usr->status}}</td>
				<td class="text-center">
					<a href="subdemografico/agregar-subdemografico/{{$usr->id}}" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-plus"></span> Subdemografico</a>
					<a class='btn btn-info btn-xs' href="encuesta/editar-encuesta/{{$usr->id}}" data-toggle="modal1" data-target=".bd-example-modal-sm"><span class="glyphicon glyphicon-edit"></span> Editar</a> 
					<a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target=".bd-example-modal-sm"><span class="glyphicon glyphicon-remove"></span> Eliminar</a>
				</td>
			</tr>
			@endforeach
		</table>
	</div>
</div>


<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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
				<a href="encuesta/eliminar-encuesta/{{$usr->id}}"><button type="button" class="btn btn-primary">Eliminar</button></a>
			</div>
		</div>
	</div>
</div>
@endsection