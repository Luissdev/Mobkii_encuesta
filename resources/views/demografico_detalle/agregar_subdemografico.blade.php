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
			<a href = "#unidad" data-toggle = "tab">
				Por unidades de negocio y/o funcion
			</a>
		</li>

		<li><a href = "#localidad" data-toggle = "tab">Por localidad o area</a></li>	
	</ul>

	<div id = "myTabContent" class = "tab-content">

		<div class = "tab-pane fade in active" id = "unidad">
			<div class="container">
				<div class="row">
					<div class="control-group" id="fields">
						<label class="control-label" for="field1">Agregar subdemograficos</label>
						<div class="controls"> 
							<form role="form" method="POST" action="{{ url('/auth/subdemografico/agregar-subdemografico') }}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="hidden" name="status" value="1">
								<input type="hidden" name="id_demografico" value="1">
								<input type="hidden" name="id_encuesta" value="{{$encuesta->id}}">
								<button type="submit" class="btn btn-primary">
									Agregar subdemograficos
								</button>
								<div class="entry input-group col-xs-3" style="margin-top: 10px;">
									<input class="form-control" name="subdemografico[]" type="text" placeholder="Ingrese el subdemografico" />
									<span class="input-group-btn">
										<button class="btn btn-success btn-add" type="button">
											<span class="glyphicon glyphicon-plus"></span>
										</button>
									</span>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class = "tab-pane fade" id = "localidad">
			<div class="container">
				<div class="row">
					<div class="control-group" id="fields">
						<label class="control-label" for="field1">Agregar subdemograficos</label>
						<div class="controls"> 
							<form role="form" method="POST" action="{{ url('/auth/subdemografico/agregar-subdemografico') }}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="hidden" name="status" value="1">
								<input type="hidden" name="id_demografico" value="1">
								<input type="hidden" name="id_encuesta" value="{{$encuesta->id}}">
								<button type="submit" class="btn btn-primary">
									Agregar subdemograficos
								</button>
								<div class="entry input-group col-xs-3" style="margin-top: 10px;">
									<input class="form-control" name="subdemografico[]" type="text" placeholder="Ingrese el subdemografico" />
									<span class="input-group-btn">
										<button class="btn btn-success btn-add" type="button">
											<span class="glyphicon glyphicon-plus"></span>
										</button>
									</span>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

	<script type="text/javascript">
		$(function()
		{
			$(document).on('click', '.btn-add', function(e)
			{
				e.preventDefault();

				var controlForm = $('.controls form:first'),
				currentEntry = $(this).parents('.entry:first'),
				newEntry = $(currentEntry.clone()).appendTo(controlForm);

				newEntry.find('input').val('');
				controlForm.find('.entry:not(:last) .btn-add')
				.removeClass('btn-add').addClass('btn-remove')
				.removeClass('btn-success').addClass('btn-danger')
				.html('<span class="glyphicon glyphicon-minus"></span>');
			}).on('click', '.btn-remove', function(e)
			{
				$(this).parents('.entry:first').remove();

				e.preventDefault();
				return false;
			});
		});

		$(function()
		{
			$(document).on('click', '.btn-add', function(e)
			{
				e.preventDefault();

				var controlForm = $('.controls form:first'),
				currentEntry = $(this).parents('.entry:first'),
				newEntry = $(currentEntry.clone()).appendTo(controlForm);

				newEntry.find('input').val('');
				controlForm.find('.entry:not(:last) .btn-add')
				.removeClass('btn-add').addClass('btn-remove')
				.removeClass('btn-success').addClass('btn-danger')
				.html('<span class="glyphicon glyphicon-minus"></span>');
			}).on('click', '.btn-remove', function(e)
			{
				$(this).parents('.entry:first').remove();

				e.preventDefault();
				return false;
			});
		});



	</script>
	@endsection

