@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Agregar encuesta</div>
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

					<form class="form-horizontal margen" role="form" method="POST" action="{{ url('/auth/encuesta/agregar-encuesta') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="status" value="1">
						<div class="form-group">
							<label class="col-md-4 control-label">Nombre</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="nombre" value="{{old('nombre')}}">
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
						
<!-- 						<div class="well">
							<div id="datetimepicker1" class="input-append date">
								<input data-format="dd/MM/yyyy hh:mm:ss" type="text"></input>
								<span class="add-on">
									<i data-time-icon="icon-time" data-date-icon="icon-calendar">
									</i>
								</span>
							</div>
						</div>
						<script type="text/javascript">

							$.getScript("http://tarruda.github.io/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js", function(){
								$.getScript("http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js", function(){

									$('#datetimepicker1').datetimepicker({
										language: 'pt-BR'
									});



							});//get script
							});//
						</script> -->

					
					<div class="form-group">
						<div class="col-md-6 col-md-offset-4">
							<button type="submit" class="btn btn-primary">
								Agregar encuesta
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>

<script>
	$.getScript("http://tarruda.github.io/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js", function(){
		$.getScript("http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js", function(){

			$('#datetimepicker1').datetimepicker();


	});//get script
	});//get script
</script>
@endsection
