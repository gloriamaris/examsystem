@extends('layouts.auth')

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

                        @if (session('status'))
                            <article class="message is-success">
                                <div class="message-body">
                                    {{ session('status') }} Please check your inbox or spam folder.
                                </div>
                            </article>
                        @endif

                        <form role="form" method="POST" action="{{ url('password/email') }}">
                            <div class="field">
                                <label class="label">Please enter your e-mail address.</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input" name="email" type="email" placeholder="person@up.edu.ph" value="{{ old('email') }}">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <input type="submit" class="button is-primary" value="Reset password"/>
                                <a href="{{ route('auth.register') }}" class="button is-info is-inverted">Go back to login</a>
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
