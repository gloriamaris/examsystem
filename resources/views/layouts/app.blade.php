<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>

<body class="page-header-fixed">

    @include('partials.analytics')

    <div class="page-header">
        @include('partials.header')
    </div>

    <div class="clearfix"></div>

    <div class="container is-widescreen with-navbar-fixed-top">
        <div class="columns">
            @if(isset($siteTitle))
                <h3 class="page-title">
                    {{ $siteTitle }}
                </h3>
            @endif

            {{-- 
                TODO: To correct error messages in this page
                --}}
            {{-- <div class="column">
                @if (Session::has('message'))
                    <div class="note note-info">
                        <p>{{ Session::get('message') }}</p>
                    </div>
                @endif
                @if ($errors->count() > 0)
                    <div class="note note-danger">
                        <ul class="list-unstyled">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div> --}}

            @yield('content')
        </div>
    </div>

    <div class="scroll-to-top"
         style="display: none;">
        <i class="fa fa-arrow-up"></i>
    </div>

    {!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
        <button type="submit">Logout</button>
    {!! Form::close() !!}

    @include('partials.javascripts')

    <div class="footer-section">
        <footer class="footer mt-5">
            <div class="content has-text-centered">
                <p>
                    <strong>University of the Philippines Open University Exam System</strong> by Monique Dingding <a href="https://github.com/gloriamaris">@gloriamaris</a>. Final Project deliverable for
                    <a href="https://upou.instructure.com/courses/117">IS226 Web Information Systems</a>. <br/>Copyright 2021. All rights reserved.
                </p>
            </div>
        </footer>
    </div>
</body>
</html>