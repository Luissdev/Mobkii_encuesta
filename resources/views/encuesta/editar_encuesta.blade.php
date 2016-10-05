@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Encuesta</div>
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

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/encuesta/editar-encuesta') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="id" value="{{ $encuesta->id}}">
						<div class="form-group">
							<label class="col-md-4 control-label">Nombre</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="nombre" value="{{$encuesta->nombre}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Modelos</label>
							<div class="col-md-6">
								<select name="modelo_id" class="form-control">
									@foreach($modelos as $modelo)
									<option name="" value="{{$modelo->id}}">{{$modelo->nombre}}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Status</label>
							<div class="col-md-6">
							<select name="status" class="form-control">
							@if($encuesta->status == 1)
								<option value="1">Activa</option>
							@else
								<option value="2">Finalizada</option>
							</select>
							@endif
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Actualizar
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
