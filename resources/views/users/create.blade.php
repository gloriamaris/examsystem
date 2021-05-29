@extends('layouts.app')

@section('title')
Add User - UP Online Examination System
@endsection

@section('content')
<div class="column">
    <h3 class="title is-3">Add New User</h3>
    
    <div class="columns">
        <div class="column is-half">
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
                    <div class="control has-icons-left">
                        <div class="select is-fullwidth">
                            <select name="role_id">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <span class="icon is-left">
                            <i class="fas fa-globe"></i>
                        </span>
                    </div>
                    @if ($errors->has('password'))
                        <p class="help is-danger">{{ $errors->first('password') }}</p>
                    @endif
                </div>
                <div class="field">
                    <input type="submit" class="button is-info" value="Submit"/>
                    <a href="{{ route('users.index') }}" class="button is-info is-inverted">Go back to users</a>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            {!! Form::close() !!}
        </div>
        <div class="column"></div>
    </div>
</div>
@stop

