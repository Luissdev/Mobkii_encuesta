@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Agregar producto</div>
				<div class="panel-body">
					@if (count($errors) > 0)
					<div class="alert alert-danger">
						<strong>Whoops!</strong> Los datos que ingresaste no son válidos.<br><br>
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/productos/agregar-producto') }}" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="id_negocio" value="1">
						<div class="form-group">
							<label class="col-md-4 control-label">Nombre</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="nombre" value="{{old('nombre')}}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Precio</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="precio" value="{{old('precio')}}">
							</div>
						</div>


						<div class="form-group">
							<label class="col-md-4 control-label">Descripción</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="descripcion" value="{{old('descripcion')}}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Categoria</label>
							<div class="col-md-6">
								<select name="id_categoria" class="form-control">
									@foreach($categorias as $categoria)
									<option name="" value="{{$categoria->id}}">{{$categoria->nombre}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Estado</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="status" value="{{old('status')}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Imagen</label>
							<div class="col-md-6">
								<input type="file" class="form-control" name="imagen" value="{{old('imagen')}}" multiple>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Agregar producto
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
