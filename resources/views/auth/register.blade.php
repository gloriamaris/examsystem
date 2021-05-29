@extends('layouts.auth')

@section('title')
Register to the UP Open University Exam System
@endsection

@section('content')
<div class="container">
    <div class="columns is-desktop">
        <div class="column"></div>
        <div class="column is-half">
            <div class="column is-full">
                <img src="/upou-examsystem-logo.png" classname="login-img">
            </div>
            <nav class="panel">
                <p class="panel-heading">
                    Sign up
                </p>
                <div class="panel-block">
                    <div class="column">
                        <form role="form" method="POST" action="{{ url('/register') }}">
                            {{ csrf_field() }}
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
                                <label class="label">Confirm password*</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input {{ $errors->has('password_confirmation') ? 'is-danger' : '' }}" name="password_confirmation" type="password" placeholder="******" value="" required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="icon is-small is-right">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </span>
                                    @endif
                                </div>
                                @if ($errors->has('password_confirmation'))
                                    <p class="help is-danger">{{ $errors->first('password_confirmation') }}</p>
                                @endif
                            </div>
                            <div class="field">
                                <input type="submit" class="button is-primary" value="Sign up"/>
                                <a href="{{ route('auth.login') }}" class="button is-info is-inverted">Go back to login</a>
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
        <div class="column"></div>
    </div>
</div>
@endsection
