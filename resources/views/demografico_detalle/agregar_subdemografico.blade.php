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
		<li class = "active"><a href = "#unidad" data-toggle = "tab">Por unidades de negocio y/o funcion</a></li>
		<li><a href = "#localidad" data-toggle = "tab">Por localidad o area</a></li>	
		<li><a href = "#personal" data-toggle = "tab">Por tipo de personal</a></li>	
	</ul>

	<div id = "myTabContent" class = "tab-content">

		<div class = "tab-pane fade in active" id = "unidad">
			<div class="container">
				<div class="row">
					<div class="control-group" id="fields">
						<label class="control-label" for="field1">Agregar subdemograficos</label>
						<div class="unidad"> 
							<form role="form" method="POST" action="{{ url('/auth/subdemografico/agregar-subdemografico') }}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="hidden" name="status" value="1">
								<input type="hidden" name="demografico_id" value="1">
								<input type="hidden" name="encuesta_id" value="{{$encuesta->id}}">
								<button type="submit" class="btn btn-primary">
									Agregar subdemograficos
								</button>
								@foreach($subdemograficos as $sd)
								<div class="entry input-group col-xs-3" style="margin-top: 10px;">
									<input class="form-control" name="subdemografico[]" type="text" placeholder="{{$sd->nombre}}" />
									<span class="input-group-btn">
										<button class="btn btn-danger btn-remove btn-dunidad" type="button">
											<span class="glyphicon glyphicon-minus"></span>
										</button>
									</span>
								</div>
								@endforeach
								<div class="entry input-group col-xs-3" style="margin-top: 10px;">
									<input class="form-control" name="subdemografico[]" type="text" placeholder="Ingrese el subdemografico" />
									<span class="input-group-btn">
										<button class="btn btn-success btn-add btn-unidad" type="button">
											<span class="glyphicon glyphicon-plus"></span>
										</button>
									</span>
								</div>

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
							<div class="localidad"> 
								<article>
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input type="hidden" name="status" value="1">
									<input type="hidden" name="demografico_id" value="2">
									<input type="hidden" name="encuesta_id" value="{{$encuesta->id}}">
									<button type="submit" class="btn btn-primary">
										Agregar subdemograficos
									</button>
									<div class="entry input-group col-xs-3" style="margin-top: 10px;">
										<input class="form-control" name="subdemografico[]" type="text" placeholder="Ingrese el subdemografico" />
										<span class="input-group-btn">
											<button class="btn btn-success btn-add btn-localidad" type="button">
												<span class="glyphicon glyphicon-plus"></span>
											</button>
										</span>
									</div>
								</article>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class = "tab-pane fade" id = "personal">
				<div class="container">
					<div class="row">
						<div class="control-group" id="fields">
							<label class="control-label" for="field1">Agregar subdemograficos</label>
							<div class="personal"> 
								<article>
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input type="hidden" name="status" value="1">
									<input type="hidden" name="demografico_id" value="3">
									<input type="hidden" name="encuesta_id" value="{{$encuesta->id}}">
									<button type="submit" class="btn btn-primary">
										Agregar subdemograficos
									</button>
									<div class="entry input-group col-xs-3" style="margin-top: 10px;">
										<input class="form-control" name="subdemografico[]" type="text" placeholder="Ingrese el subdemografico" />
										<span class="input-group-btn">
											<button class="btn btn-success btn-add btn-personal" type="button">
												<span class="glyphicon glyphicon-plus"></span>
											</button>
										</span>
									</div>
								</article>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

	<script type="text/javascript">
		$(function()
		{
			$(document).on('click', '.btn-unidad', function(e)
			{
				e.preventDefault();

				var controlForm = $('.unidad form:first'),
				currentEntry = $(this).parents('.entry:first'),
				newEntry = $(currentEntry.clone()).appendTo(controlForm);

				newEntry.find('input').val('');
				controlForm.find('.entry:not(:last) .btn-add')
				.removeClass('btn-add').addClass('btn-remove')
				.removeClass('btn-success').addClass('btn-danger')
				.removeClass('btn-unidad').addClass('btn-dunidad')
				.html('<span class="glyphicon glyphicon-minus"></span>');
			}).on('click', '.btn-dunidad', function(e)
			{
				$(this).parents('.entry:first').remove();

				e.preventDefault();
				return false;
			});
		});

		$(function()
		{
			$(document).on('click', '.btn-localidad', function(e)
			{
				e.preventDefault();

				var controlForm = $('.localidad article:first'),
				currentEntry = $(this).parents('.entry:first'),
				newEntry = $(currentEntry.clone()).appendTo(controlForm);

				newEntry.find('input').val('');
				controlForm.find('.entry:not(:last) .btn-add')
				.removeClass('btn-add').addClass('btn-remove')
				.removeClass('btn-success').addClass('btn-danger')
				.removeClass('btn-localidad').addClass('btn-dlocalidad')
				.html('<span class="glyphicon glyphicon-minus"></span>');
			}).on('click', '.btn-dlocalidad', function(e)
			{
				$(this).parents('.entry:first').remove();

				e.preventDefault();
				return false;
			});
		});

		$(function()
		{
			$(document).on('click', '.btn-personal', function(e)
			{
				e.preventDefault();

				var controlForm = $('.personal article:first'),
				currentEntry = $(this).parents('.entry:first'),
				newEntry = $(currentEntry.clone()).appendTo(controlForm);

				newEntry.find('input').val('');
				controlForm.find('.entry:not(:last) .btn-add')
				.removeClass('btn-add').addClass('btn-remove')
				.removeClass('btn-success').addClass('btn-danger')
				.removeClass('btn-personal').addClass('btn-dpersonal')
				.html('<span class="glyphicon glyphicon-minus"></span>');
			}).on('click', '.btn-dpersonal', function(e)
			{
				$(this).parents('.entry:first').remove();

				e.preventDefault();
				return false;
			});
		});



	</script>
	@endsection

