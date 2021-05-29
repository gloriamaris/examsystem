@extends('layouts.auth')

@section('title')
Login to the UP Open University Exam System
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
                    Log in
                </p>
                <div class="panel-block">
                    <div class="column">
                        @if (count($errors) > 0)
                            <article class="message is-danger">
                                <div class="message-body">
                                    @foreach ($errors->all() as $error)
                                        <p>{{ $error }}</p>
                                    @endforeach
                                </div>
                            </article>
                        @endif
                        <form role="form" method="POST" action="{{ url('login') }}">
                            <div class="field">
                                <label class="label">E-mail address</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input" name="email" type="email" placeholder="person@up.edu.ph" value="">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">
                                    Password
                                    <a href="{{ route('auth.password.reset') }}" class="login-link" >Forgot password?</a>
                                </label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input" name="password" type="password" placeholder="******" value="">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <label class="checkbox">
                                    <input type="checkbox">
                                    Remember me
                                </label>
                            </div>
                            <div class="field">
                                <input type="submit" class="button is-primary" value="Login"/>
                                <a href="{{ route('auth.register') }}" class="button is-info is-inverted">Register</a>
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
