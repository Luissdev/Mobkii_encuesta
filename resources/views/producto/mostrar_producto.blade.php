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
				<a href="productos/importar-producto" class="btn btn-primary btn-sm pull-right" style="margin-left: 4px;"> <span class="glyphicon glyphicon-plus"></span> Importar lista de productos</a>
				<a href="productos/agregar-producto" class="btn btn-primary btn-sm pull-right" style="margin-left: 4px;"><span class="glyphicon glyphicon-plus"></span> Agregar nuevo producto</a>

				<a href="productos/exportar-productos" class="btn btn-primary btn-sm pull-right" ><span class="glyphicon glyphicon-plus"></span> Exportar lista de productos</a>
				<tr>
					<th></th>
					<th>Nombre</th>
					<th>Precio</th>
					<th>Descripcion</th>
					<th>Categoria</th>
					<th>Imagen</th>
					<th>Estado</th>
					<th class="text-center">Acción</th>
				</tr>
			</thead>
			<?php $i=0; $img=0;?>
			@foreach($productos as $producto)
			<tr>
				<?php $i++; ?>
				<td>{{$i}}</td>
				<td>{{$producto->nombre}}</td>
				<td>{{$producto->precio}}</td>
				<td>{{$producto->descripcion}}</td>
				<td>{{$producto->id_categoria}}</td>
				<td><a href="" data-toggle="modal" data-target=".bd-example-modal-lg"><img src="{{$producto->imagen}}" style="width:32px;height:32px;"></a></td>
				<td>@if($producto->status==1) Activo @else Inactivo @endif</td>
				<td class="text-center"><a class='btn btn-info btn-xs' href="productos/editar-producto/{{$producto->id}}" data-toggle="modal1" data-target=".bd-example-modal-sm"><span class="glyphicon glyphicon-edit"></span> Editar</a> <a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target=".bd-example-modal-sm"><span class="glyphicon glyphicon-remove"></span> Eliminar</a></td>
			</tr>
			@endforeach
		</table>
		{!! $productos->render() !!}
	</div>
</div>



<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Mostrar imagen</h4>
			</div>
			<div class="modal-body">
				<img src="{{$producto->imagen}}" align="middle" style="width:512px;height:256px;">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Eliminar producto</h4>
			</div>
			<div class="modal-body">
				<p>¿Está seguro que desea eliminar el producto?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				<a href="productos/eliminar-producto/{{$producto->id}}"><button type="button" class="btn btn-primary">Eliminar</button></a>
			</div>
		</div>
	</div>
</div>
@endsection