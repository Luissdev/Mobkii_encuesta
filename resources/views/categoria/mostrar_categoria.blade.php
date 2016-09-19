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
				<a href="categoria/importar-categoria" class="btn btn-primary btn-sm pull-right" style="margin-left: 4px;"> <span class="glyphicon glyphicon-plus"></span> Importar lista de categorias</a>
				<a href="categoria/exportar-categorias" class="btn btn-primary btn-sm pull-right" style="margin-left: 4px;"> <span class="glyphicon glyphicon-plus"></span> Exportar lista de categorias</a>
				<a href="categoria/agregar-categoria" class="btn btn-primary btn-sm pull-right"><b>+</b> Agregar nueva categoria</a>
				<tr>
					<th>Nombre</th>
					<th>Descripcion</th>
					<th>ID</th>
					<th>Estado</th>
					<th class="text-center">Acción</th>
				</tr>
			</thead>

			@foreach($categorias as $categoria)
			<tr>
				<td>{{$categoria->nombre}}</td>
				<td>{{$categoria->descripcion}}</td>
				<td>{{$categoria->id}}</td>
				<td>@if($categoria->status==1) Activo @else Inactivo @endif</td>
				<td class="text-center"><a class='btn btn-info btn-xs' href="categoria/editar-categoria/{{$categoria->id}}" data-toggle="modal1" data-target=".bd-example-modal-sm"><span class="glyphicon glyphicon-edit"></span> Editar</a> <a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target=".bd-example-modal-sm"><span class="glyphicon glyphicon-remove"></span> Eliminar</a></td>
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
				<h4 class="modal-title">Eliminar categoria</h4>
			</div>
			<div class="modal-body">
				<p>¿Está seguro que desea eliminar el categoria?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				<a href="categoria/eliminar-categoria/{{$categoria->id}}"><button type="button" class="btn btn-primary">Eliminar</button></a>
			</div>
		</div>
	</div>
</div>
@endsection