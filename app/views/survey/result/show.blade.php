@extends('layouts.master')

@section('content')
<div class="row">
	<div class="col-sm-6">
		@foreach($questions as $question)
		{{ $question }}
		@endforeach
	</div>
	<div class="col-sm-6">
		<h3>Aantal deelnemers: <strong>{{ $count }}</strong></h3>
		<div class="panel panel-default">
		<div class="panel-heading">Filter opleiding</div>
			<div class="panel-body">
				{{ Form::open() }}
				{{ Form::select('filter[program]', $programs, Input::old('filter[program]'), array('class' => 'form-control')) }}
				{{ Form::close() }}
			</div>
		</div>
	</div>
</div>
@stop