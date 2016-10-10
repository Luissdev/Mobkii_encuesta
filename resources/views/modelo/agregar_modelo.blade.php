@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Modelo</div>
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

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/modelo/agregar-modelo') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="status" value="1">
						<div class="form-group">
							<label class="col-md-4 control-label">Nombre</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="nombre">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Agregar
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


{{-- <script type="text/javascript">
	$(document).ready(function(){
		$('.btn').click(function(){            
			$.ajax({
				url: '/auth/modelo/agregar-modelo',
				type: "POST",
				data: {'status':$('input[name=status]').val(), 'nombre':$('input[name=nombre]').val(), '_token': $('input[name=_token]').val()},
				success: function(data){
					alert(data);
				}
			});      
		}); 
	});
</script> --}}
@endsection
