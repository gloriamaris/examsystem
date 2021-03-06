@extends('layouts.app')

@section('content')
<div class="column">
    <h3 class="title is-3">Edit role</h3>

    <div class="columns">
        <div class="column is-half">
            {!! Form::open(['method' => 'PUT', 'route' => ['roles.update', $role->id]]) !!}
            <div class="field">
                <label class="label">Role Title</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input {{ $errors->has('title') ? 'is-danger' : '' }}" name="title" type="text" placeholder="Administrator" value="{{ $role->title }}" required>
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

    <h3 class="page-title">@lang('quickadmin.roles.title')</h3>
    
    {!! Form::model($role, ['method' => 'PUT', 'route' => ['roles.update', $role->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('title', 'Title*', ['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

