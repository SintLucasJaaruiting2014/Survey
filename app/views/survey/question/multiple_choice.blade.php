{{ Form::label("question[$id]", $label, array('class' => 'control-label')) }}
<div class="row">
@foreach($options as $option)
	<div class="col-sm-6 col-md-4 col-lg-3">
		<label>
			<input type="checkbox" name="question[{{ $id }}][]" value="{{ $option->id }}"> {{ $option->label }}
		</label>
	</div>
@endforeach
</div>
@if($customAllowed)
	{{ Form::label("question[$id][custom]", 'Overige, namelijk', array('control-label col-sm-3')) }}
	{{ Form::text("question[$id][custom]", Input::old("question[$id][custom]"), array('class' => 'form-control')) }}
@endif
