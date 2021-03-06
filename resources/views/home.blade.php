@extends('layouts.app')

@section('title')
Dashboard - UP Online Examination System
@endsection

@section('content')
<div class="column">
    <h3 class="title is-3">Dashboard</h3>

    @if ($isAdmin == 1)
    <div class="columns mt-5">
        <div class="column is-two-thirds">
            <article class="panel is-primary">
                <p class="panel-heading">Open exams</p>
                @if (count($exams) > 0)
                    @foreach ($exams as $exam)
                    <div class="panel-block">
                        <a href="{{ route('exams.edit', $exam->id) }}" class="panel-block">
                            <span class="panel-icon">
                            <i class="fas fa-book" aria-hidden="true"></i>
                            </span>
                            {{ $exam->name }} - {{ $exam->title }}
                        </a>
                    </div>
                    @endforeach
                @endif
                <div class="panel-block p-3">
                    <a href="{{ route('exams.index') }}" class="button is-outlined is-primary is-fullwidth">View more</a>
                </div>
            </article>
            <article class="panel is-info">
                <p class="panel-heading">Recently registered</p>
                @if (count($users) > 0)
                @foreach ($users as $user)
                <div class="panel-block p-2">
                    <span class="panel-icon">
                        <i class="fas fa-user" aria-hidden="true"></i>
                    </span>
                    <p>
                        {{ $user->name }} &middot; <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                    </p>
                </div>
                @endforeach
                @endif
                <div class="panel-block p-2">
                    <a href="{{ route('users.index') }}" class="button is-outlined is-info is-fullwidth">View more</a>
                </div>
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
                                        <img src="https://i.pinimg.com/474x/69/77/b7/6977b70a129ec184527433bbdf9fe457.jpg"
                                            alt="Placeholder image" width="50" height="50"
                                            style="overflow: hidden;">
                                    </figure>
                                </div>
                                <div class="media-content">
                                    <p class="title is-4">{{ $announcement->name }}</p>
                                    <p class="subtitle is-6"><i class="fas fa-envelope" aria-hidden="true"></i>
                                        {{ $announcement->email }}</p>
                                </div>
                            </div>
                            <p>
                                {{ $announcement->description }}
                                <br /><br />
                                <time
                                    datetime={{ $announcement->created_at }}>{{ date('g:i A', strtotime($announcement->created_at)) }}
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
    @endif
</div>
@endsection
