@extends('layouts.app')

@section('title')
Add Role - UP Online Examination System
@endsection

@section('content')
<div class="column">
    <h3 class="title is-3">Add new role</h3>

    <div class="columns">
        <div class="column is-half">
            {!! Form::open(['method' => 'POST', 'route' => ['roles.store']]) !!}
            <div class="field">
                <label class="label">Role Title</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input {{ $errors->has('title') ? 'is-danger' : '' }}" name="title" type="text" placeholder="Administrator" value="{{ old('title') }}" required>
                    <span class="icon is-small is-left">
                        <i class="fas fa-key"></i>
                    </span>
                    @if ($errors->has('title'))
                        <span class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    @endif
                </div>
                @if ($errors->has('title'))
                    <p class="help is-danger">{{ $errors->first('title') }}</p>
                @endif
            </div>
            <div class="field">
                <input type="submit" class="button is-info" value="Submit"/>
                <a href="{{ route('roles.index') }}" class="button is-info is-inverted">Go back to roles</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop

