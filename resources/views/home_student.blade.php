@extends('layouts.app')

@section('title')
Dashboard - UP Online Examination System
@endsection

@section('content')
<div class="column">
    <h3 class="title is-3">Dashboard</h3>

    <div class="columns mt-5">
        <div class="column is-two-thirds">
            <article class="panel is-primary">
                <p class="panel-heading">Open exams</p>
                @if (count($exams) > 0)
                @foreach ($exams as $exam)
                <div class="panel-block">
                    <a href="{{ route('tests.show', $exam->id) }}" class="panel-block">
                        <span class="panel-icon">
                            <i class="fas fa-book" aria-hidden="true"></i>
                        </span>
                        {{ $exam->name }} - {{ $exam->title }}
                    </a>
                </div>
                @endforeach
                @endif
            </article>
        </div>
        <div class="column">
            <article class="panel is-warning">
                <p class="panel-heading">Announcements</p>

                @if (count($announcements) > 0)
                @foreach ($announcements as $announcement)
                <div class="panel-block">
                    <div class="p-3">
                        <div class="media">
                            <div class="media-left mb-5">
                                <figure class="image is-48x48">
                                    <img src="https://i.pinimg.com/474x/69/77/b7/6977b70a129ec184527433bbdf9fe457.jpg" alt="Placeholder image" width="50" height="50" style="overflow: hidden;">
                                </figure>
                            </div>
                            <div class="media-content">
                                <p class="title is-4">{{ $announcement->name }}</p>
                                <p class="subtitle is-6"><i class="fas fa-envelope" aria-hidden="true"></i>
                                    {{ $announcement->email }}
                                </p>
                            </div>
                        </div>
                        <p>
                            {{ $announcement->description }}
                            <br /><br />
                            <time datetime={{ $announcement->created_at }}>{{ date('g:i A', strtotime($announcement->created_at)) }}
                                &middot; {{ date('j F Y', strtotime($announcement->created_at)) }}</time>
                        </p>
                    </div>
                </div>
                @endforeach
                @else
                <div class="panel-block">
                    <div class="p-3">
                        Nothing to display. Have a good day!
                    </div>
                </div>
                @endif
            </article>
        </div>
    </div>
</div>
@endsection