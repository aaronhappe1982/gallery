@extends('layouts.scaffold')

@section('main')

<h1>Show Gallery</h1>

<p>{{ link_to_route('galleries.index', 'Return to all galleries') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Gallery_id</th>
				<th>Title</th>
				<th>Description</th>
				<th>Image</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $gallery->gallery_id }}}</td>
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
	</tbody>
</table>

@stop
