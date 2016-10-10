@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Recuperar contarseña</div>
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

{{-- 					@if(Session::has('recuperada'))
					<div class="alert alert-succes">
						{{Session::get('recuperada')}}
					</div>
					@endif --}}

					<form class="form-horizontal" role="form" method="POST" action="{{ url('validacion/recuperar') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">					
						{{-- <input type="hidden" name="admin" value="0"> --}}
						<input type="hidden" name="status" value="1">

						<div class="form-group">
							<label class="col-md-4 control-label">Nombre</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Correo</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirmar correo</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email_confirmation" value="{{ old('email') }}">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Recuperar contraseña
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
