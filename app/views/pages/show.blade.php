@extends('layouts.scaffold')

@section('main')

<h1>Show Page</h1>

<p>{{ link_to_route('pages.index', 'Return to all pages') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Name</th>
				<th>Subtitle</th>
				<th>Markup</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $page->name }}}</td>
					<td>{{{ $page->subtitle }}}</td>
					<td>{{{ $page->markup }}}</td>
                    <td>{{ link_to_route('pages.edit', 'Edit', array($page->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('pages.destroy', $page->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
