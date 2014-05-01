@extends('layouts.scaffold')

@section('main')

<h1>Create Artwork</h1>

{{ Form::open(array('route' => 'artworks.store', 'files' => true)) }}
	<ul>
        <li>
            {{ Form::label('gallery_id', 'Gallery_id:') }}
            <select name="gallery_id">
            @foreach($galleries as $gallery)
                <option value="{{$gallery->id}}">{{ $gallery->title }}</option>
            @endforeach
            </select>
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
            {{ Form::file('image') }}
        </li>

		<li>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


