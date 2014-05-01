@extends('layouts.scaffold')

@section('main')

<h1>Show Artwork</h1>

<p>{{ link_to_route('artworks.index', 'Return to all artworks') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Gallery_id</th>
				<th>Name</th>
				<th>Description</th>
				<th>Image</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $artwork->gallery_id }}}</td>
					<td>{{{ $artwork->name }}}</td>
					<td>{{{ $artwork->description }}}</td>
					<td>{{{ $artwork->image }}}</td>
                    <td>{{ link_to_route('artworks.edit', 'Edit', array($artwork->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('artworks.destroy', $artwork->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
