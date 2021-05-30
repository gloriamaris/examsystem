@extends('layouts.app')

@section('content')
<div class="column">
    <h3 class="title is-3">Add new user</h3>
    
    <div class="columns">
        {{ $relations }}
        <div class="column is-three-fifths">
            {!! Form::open(['method' => 'POST', 'route' => ['users.store']]) !!}
                <div class="field">
                    <label class="label">Full name*</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input {{ $errors->has('name') ? 'is-danger' : '' }}" name="name" type="text" placeholder="Person McPerson" value="{{ old('name') }}" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                        </span>
                        @if ($errors->has('name'))
                            <span class="icon is-small is-right">
                                <i class="fas fa-exclamation-triangle"></i>
                            </span>
                        @endif
                    </div>
                    @if ($errors->has('name'))
                        <p class="help is-danger">{{ $errors->first('name') }}</p>
                    @endif
                </div>
                <div class="field">
                    <label class="label">E-mail address*</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input {{ $errors->has('email') ? 'is-danger' : '' }}" name="email" type="email" placeholder="person@up.edu.ph" value="{{ old('email') }}" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        @if ($errors->has('email'))
                            <span class="icon is-small is-right">
                                <i class="fas fa-exclamation-triangle"></i>
                            </span>
                        @endif
                    </div>
                    @if ($errors->has('email'))
                        <p class="help is-danger">{{ $errors->first('email') }}</p>
                    @endif
                </div>
                <div class="field">
                    <label class="label">Password*</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input {{ $errors->has('password') ? 'is-danger' : '' }}" name="password" type="password" placeholder="******" value="" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                        </span>
                        @if ($errors->has('password'))
                            <span class="icon is-small is-right">
                                <i class="fas fa-exclamation-triangle"></i>
                            </span>
                        @endif
                    </div>
                    @if ($errors->has('password'))
                        <p class="help is-danger">{{ $errors->first('password') }}</p>
                    @endif
                </div>
                <div class="field">
                    <label class="label">Role*</label>
                    <div class="control">
                        <div class="select is-fullwidth">
                            <select name="role_id">
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @if ($errors->has('role_id'))
                        <p class="help is-danger">{{ $errors->first('role_id') }}</p>
                    @endif
                </div>
                <div class="field">
                    <input type="submit" class="button is-primary" value="Submit"/>
                    <a href="{{ route('users.index') }}" class="button is-info is-inverted">Go back to users</a>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            {!! Form::close() !!}
        </div>
        <div class="column"></div>
    </div>
</div>

    <h3 class="page-title">@lang('quickadmin.results.title')</h3>
    
    {!! Form::model($result, ['method' => 'PUT', 'route' => ['results.update', $result->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('user_id', 'User*', ['class' => 'control-label']) !!}
                    {!! Form::select('user_id', $users, old('user_id'), ['class' => 'form-control']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('user_id'))
                        <p class="help-block">
                            {{ $errors->first('user_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('question_id', 'Question*', ['class' => 'control-label']) !!}
                    {!! Form::select('question_id', $questions, old('question_id'), ['class' => 'form-control']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('question_id'))
                        <p class="help-block">
                            {{ $errors->first('question_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('correct', 'Correct*', ['class' => 'control-label']) !!}
                    {!! Form::text('correct', old('correct'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('correct'))
                        <p class="help-block">
                            {{ $errors->first('correct') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('date', 'Date*', ['class' => 'control-label']) !!}
                    {!! Form::text('date', old('date'), ['class' => 'form-control datetime', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('date'))
                        <p class="help-block">
                            {{ $errors->first('date') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent
    <script src="{{ url('quickadmin/js') }}/timepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
    <script>
        $('.datetime').datetimepicker({
            autoclose: true,
            dateFormat: "{{ config('app.date_format_js') }}",
            timeFormat: "hh:mm:ss"
        });
    </script>

@stop