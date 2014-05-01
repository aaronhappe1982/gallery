@extends('layouts.scaffold')

@section('main')

<h1>Edit Artwork</h1>
{{ Form::model($artwork, array('method' => 'PATCH', 'route' => array('artworks.update', $artwork->id))) }}
	<ul>
        <li>
            {{ Form::label('gallery_id', 'Gallery_id:') }}
            {{ Form::input('number', 'gallery_id') }}
        </li>

        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name') }}
        </li>

        <li>
            {{ Form::label('description', 'Description:') }}
            {{ Form::textarea('description') }}
        </li>

        <li>
            {{ Form::label('image', 'Image:') }}
            {{ Form::text('image') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('artworks.show', 'Cancel', $artwork->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
