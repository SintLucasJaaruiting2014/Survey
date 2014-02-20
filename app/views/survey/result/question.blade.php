<ul class="list-group">
	<li class="list-group-item">
		<h4 class="list-group-item-heading">{{ $question }}</h4>
	</li>
@foreach($options as $option)
	<li class="list-group-item">
		<span class="badge badge-danger">{{ $results[(int) $option->id] or 0 }}</span>
		{{ $option->label }}
	</li>
@endforeach
</ul>