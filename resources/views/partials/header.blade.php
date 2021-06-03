<?php 
    $validDropdownRoutes = ['users.index', 'roles.index', 'announcements.index', 'users.create', 'roles.create', 'announcements.create', 'users.edit', 'roles.edit', 'announcements.edit'];
    
    $isDropdownItemActive = strpos(\Route::current()->getName(), "users") !== false || strpos(\Route::current()->getName(), "roles") !== false || strpos(\Route::current()->getName(), "announcements") !== false;
?>

<nav class="navbar navbar-height is-fixed-top" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="{{ route('home') }}">
            <img src="{{ url('upou-exam-logo.png') }}" class="header-img">
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
        <a class="navbar-item {{ \Route::current()->getName() === 'home' ? 'navbar-link-is-active' : '' }}"
            href="{{ route('home') }}">
            Home
        </a>
        @if (\Auth::user()->role_id == 1)
        <a class="navbar-item {{ strpos(\Route::current()->getName(), "topics") !== false ? 'navbar-link-is-active' : '' }}"
            href="{{ route('topics.index') }}">
            Courses
        </a>

        <a class="navbar-item {{ strpos(\Route::current()->getName(), "exams") !== false ? 'navbar-link-is-active' : '' }}"
            href="{{ route('exams.index') }}">
            Exams
        </a>

        <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link {{ $isDropdownItemActive ? 'navbar-link-is-active' : '' }}">
            Admin Panel
            </a>

            <div class="navbar-dropdown">
                <a class="navbar-item {{ strpos(\Route::current()->getName(), "announcements") !== false ? 'navbar-link-is-active' : '' }}"
                    href="{{ route('announcements.index') }}">
                    Announcements
                </a>
                <a class="navbar-item {{ strpos(\Route::current()->getName(), "users") !== false ? 'navbar-link-is-active' : '' }}"
                    href="{{ route('users.index') }}">
                    Users
                </a>
                <a class="navbar-item {{ strpos(\Route::current()->getName(), "roles") !== false ? 'navbar-link-is-active' : '' }}"
                    href="{{ route('roles.index') }}">
                    User Roles
                </a>
            </div>
        </div>
        @endif
        </div>

        <div class="navbar-end">
            @if (\Auth::user()->role_id !== 1)
            <div class="navbar-item">
                Hello, <span class="has-text-weight-bold">&nbsp;{{ \Auth::user()->name }}!</span>
                {!! Form::open(['route' => 'auth.logout', 'id' => 'logout']) !!}
                    <button type="submit" class="button is-dark is-inverted">Log out</button>
                {!! Form::close() !!}
            </div>
            @else
            <div class="navbar-item">
                <div class="buttons">
                    <a class="button is-primary" href="{{ route('tests.index') }}">
                        <strong>Create exam</strong>
                    </a>
                    {!! Form::open(['route' => 'auth.logout', 'id' => 'logout']) !!}
                    <button type="submit" class="button is-dark is-inverted">Log out</button>
                    {!! Form::close() !!}
                </div>
            </div>
            @endif
        </div>
    </div>
</nav>