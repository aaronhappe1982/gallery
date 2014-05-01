@extends('layouts.scaffold')

@section('main')

<h1>All Galleries</h1>

<p>{{ link_to_route('galleries.create', 'Add new gallery') }}</p>

@if ($galleries->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Title</th>
				<th>Description</th>
				<th>Image</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($galleries as $gallery)
				<tr>
					<td>{{{ $gallery->title }}}</td>
					<td>{{{ $gallery->description }}}</td>
					<td>{{{ $gallery->image }}}</td>
                    <td>{{ link_to_route('galleries.edit', 'Edit', array($gallery->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('galleries.destroy', $gallery->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no galleries
@endif

@stop
