@extends('layouts.auth')

@section('title')
Reset Password
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
                    Reset Password
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
                        <form role="form" method="POST" action="{{ url('password/reset') }}">
                            <div class="field">
                                <label class="label">E-mail address*</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input {{ $errors->has('email') ? 'is-danger' : '' }}" name="email" type="email" placeholder="person@up.edu.ph" value="{{ old('email') }}" required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Password*</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input {{ $errors->has('password') ? 'is-danger' : '' }}" name="password" type="password" placeholder="******" value="" required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Confirm password*</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input {{ $errors->has('password_confirmation') ? 'is-danger' : '' }}" name="password_confirmation" type="password" placeholder="******" value="" required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </div>
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="field">
                                <input type="submit" class="button is-primary" value="Reset password"/>
                                <a href="{{ route('auth.login') }}" class="button is-info is-inverted">Go back to login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
        <div class="column"></div>
    </div>
</div>
@endsection
