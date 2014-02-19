@extends('layouts.master')

@section('content')
	<div class="jumbotron">
		<h1>{{ $name }}</h1>
		{{ $description }}
	</div>

	{{ Form::open(array('action' => 'survey.controllers.frontend@store')) }}

		<div class="row">
			<div class="form-group col-md-6">
				{{ Form::label('name', 'Naam', array('class' => 'control-label')) }}
				{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
			</div>

			<div class="form-group col-md-6">
				{{ Form::label('program', 'Opleiding', array('class' => 'control-label')) }}
				{{ Form::select('program', $programs, Input::old('program'), array('class' => 'form-control')) }}
			</div>
		</div>

		<hr>

		{{ $questions }}

		<div class="form-group">
			<button type="submit" class="btn btn-primary">Versturen</button>
		</div>
	{{ Form::close() }}
@stop