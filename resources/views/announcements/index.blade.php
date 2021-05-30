@extends('layouts.app')


@section('title')
    Announcements - UP Online Examination System
@endsection

@section('content')
    <div class="column">
        <h3 class="title is-3">Announcements</h3>
        <div class="columns">
            <div class="column is-three-fifths">
                <a href="{{ route('announcements.create') }}" class="button is-info mb-5"><i
                        class="fa fa-plus mr-1"></i>Post new</a>
                <article class="panel is-warning">
                    <p class="panel-heading">Announcements</p>
                    @if (count($announcements > 0))
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
                                            <p class="title is-4">{{ $name }}</p>
                                            <p class="subtitle is-6"><i class="fas fa-envelope" aria-hidden="true"></i>
                                                {{ $email }}</p>
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
                            <div class="panel-block is-right">
                                <a href="{{ route('announcements.edit', $announcement->id) }}"
                                    class="button is-link is-inverted"> Edit</a>

                                  {!! Form::open([
                                      'style' => 'display: inline-block;',
                                      'method' => 'DELETE',
                                      'onsubmit' => "return confirm('" . trans('quickadmin.are_you_sure') . "');",
                                      'route' => ['announcements.destroy', $announcement->id],
                                  ]) !!}
                                  {!! Form::submit(trans('quickadmin.delete'), ['class' => 'button is-link is-inverted']) !!}
                                  {!! Form::close() !!}
                            </div>
                        @endforeach
                    @endif
                </article>
            </div>
            <div class="column"></div>
            <div class="column"></div>
        </div>
    </div>
@stop
