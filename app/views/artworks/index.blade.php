@extends('layouts.scaffold')

@section('main')

<h1>All Artworks</h1>

<p>{{ link_to_route('artworks.create', 'Add new artwork') }}</p>

@if ($artworks->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Gallery</th>
				<th>Name</th>
				<th>Description</th>
				<th>Image</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($artworks as $artwork)
				<tr>
					<td>{{{ $artwork->gallery->title }}}</td>
					<td>{{{ $artwork->name }}}</td>
					<td>{{{ $artwork->description }}}</td>
					<td>{{ HTML::image($artwork->image) }}</td>
                    <td>{{ link_to_route('artworks.edit', 'Edit', array($artwork->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('artworks.destroy', $artwork->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no artworks
@endif

@stop
