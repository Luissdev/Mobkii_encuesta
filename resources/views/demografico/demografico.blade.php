@extends('app')

@section('content')
@if (Session::has('error'))
<div class="alert alert-danger">
	<strong>Whoops!</strong> Algo salió mal.<br><br>
	{{Session::get('error')}}
</div>
@endif
<div class="container">
	<ul id = "myTab" class = "nav nav-tabs">
		<li class = "active">
			<a href = "#demografico" data-toggle = "tab">
				Demograficos
			</a>
		</li>

		<li><a href = "#subdemografico" data-toggle = "tab">Subdemograficos</a></li>

	</ul>
	<div id = "myTabContent" class = "tab-content">

		<div class = "tab-pane fade in active" id = "demografico">
			<div class="row col-md-10 col-md-offset-1 custyle">
				<table class="table table-striped custab">
					<thead>
						<a href="demografico/agregar-demografico" class="btn btn-primary btn-sm pull-right" style="margin-left: 4px;"><span class="glyphicon glyphicon-plus"></span> Agregar nuevo demografico</a>
						<a href="demografico/importar-demografico" class="btn btn-primary btn-sm pull-right" style="margin-left: 4px;"> <span class="glyphicon glyphicon-plus"></span> Importar lista de demografico</a>
						<a href="demografico/exportar-demografico" class="btn btn-primary btn-sm pull-right" style="margin-left: 4px;"> <span class="glyphicon glyphicon-plus"></span> Exportar lista de demografico</a>
						<tr>
							<th>Nombre</th>
							<th>Status</th>
							<th class="text-center">Acción</th>
						</tr>
					</thead>
					@if (count($demograficos)>0)
					@foreach($demograficos as $usr)
					<tr>
						<td>{{$usr->nombre}}</td>
						<td>{{$usr->status}}</td>
						<td class="text-center">
							<a href="subdemografico/agregar-subdemografico" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-plus"></span> Subdemografico</a>
							<a class='btn btn-info btn-xs' href="demografico/editar-demografico/{{$usr->id}}" data-toggle="modal1" data-target=".bd-example-modal-sm"><span class="glyphicon glyphicon-edit"></span> Editar</a>
							<a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target=".bd-example-modal-sm"><span class="glyphicon glyphicon-remove"></span> Eliminar</a>
						</td>
					</tr>
					@endforeach
				</table>
			</div>
		</div>

		<div class = "tab-pane fade" id = "subdemografico">
			<p>iOS is a mobile operating system developed and distributed 
				by Apple Inc. Originally released in 2007 for the iPhone, iPod Touch,
				and Apple TV. iOS is derived from OS X, with which it shares the 
				Darwin foundation. iOS is Apple's mobile version of the OS X 
				operating system used on Apple computers.</p>
			</div>
		</div>


		<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title">Eliminar demografico</h4>
					</div>
					<div class="modal-body">
						<p>¿Está seguro que desea eliminar el demografico?</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<a href="demografico/eliminar-demografico/{{$usr->id}}"><button type="button" class="btn btn-primary">Eliminar</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endif
	@endsection