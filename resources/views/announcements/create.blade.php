@extends('layouts.app')


@section('title')
Post new - UP Online Examination System
@endsection

@section('content')
<div class="column">
    <h3 class="title is-3">Post new announcement</h3>

    <div class="columns">
        <div class="column is-half">
            {!! Form::open(['method' => 'POST', 'route' => ['announcements.store']]) !!}
            <div class="field">
                <div class="control">
                    <textarea name="description" class="textarea" placeholder="What's on your mind?" rows="10" required>{{  old('description') }}</textarea>
                </div>
                @if ($errors->has('description'))
                    <p class="help is-danger">{{ $errors->first('description') }}</p>
                @endif
            </div>
            <div class="field">
                <input type="submit" class="button is-info" value="Submit"/>
                <a href="{{ route('announcements.index') }}" class="button is-info is-inverted">Go back to announcements</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop

