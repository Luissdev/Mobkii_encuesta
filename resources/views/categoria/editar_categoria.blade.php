@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Actualizar categoria</div>
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

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/categoria/editar-categoria') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="id" value="{{ $categoria->id}}">
						<div class="form-group">
							<label class="col-md-4 control-label">Nombre</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="nombre" value="{{$categoria->nombre}}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Descripcion</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="descripcion" value="{{$categoria->descripcion}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Estado</label>
							<div class="col-md-6">
							<select name="status" class="form-control">
								<option value="1">Activo</option>
								<option value="0">Inactivo</option>
							</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Actualizar categoria
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
