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
			<div class="container">
				<div class="row">
					<div class="control-group" id="fields">
						<label class="control-label" for="field1">Agregar demograficos</label>
						<div class="controls"> 
							<form role="form" autocomplete="off" method="POST" action="{{ url('/auth/subdemografico/agregar-subdemografico') }}">
								<button type="submit" class="btn btn-primary">
									Agregar subdemograficos
								</button>
								<div class="entry input-group col-xs-3" style="margin-top: 10px;">
									<input class="form-control" name="subdemografico[]" type="text" placeholder="Ingrese el demografico" />
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

			</script>
		</div>

		<div class = "tab-pane fade" id = "subdemografico">
			<p>subdemograficos</p>
		</div>
	</div>
	@endsection

