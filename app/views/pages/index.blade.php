@extends('layouts.scaffold')

@section('main')

<h1>All Pages</h1>

<p>{{ link_to_route('pages.create', 'Add new page') }}</p>

@if ($pages->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>Subtitle</th>
				<th>Markup</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($pages as $page)
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
			@endforeach
		</tbody>
	</table>
@else
	There are no pages
@endif

@stop
