@extends('layouts.app')

@section('title')
Create Exam - UP Online Examination System
@endsection

@section('content')
<div class="column">
    <h3 class="title is-3">New Examination</h3>

    <div class="columns">
        <div class="column is-half">
            {!! Form::open(['method' => 'POST', 'route' => ['exams.store']]) !!}
            <div class="field">
                <label class="label">Course*</label>
                <div class="control">
                    <div class="select is-fullwidth">
                        <select name="topic_id">
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @if ($errors->has('topic_id'))
                    <p class="help is-danger">{{ $errors->first('topic_id') }}</p>
                @endif
            </div>
            <div class="field">
                <label class="label">Exam Name*</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input {{ $errors->has('name') ? 'is-danger' : '' }}" name="name" type="text" placeholder="Midterm/Finals" value="{{ old('name') }}" required>
                    <span class="icon is-small is-left">
                        <i class="fas fa-book"></i>
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
                <div class="control">
                    <label class="label">Start Date*</label>
                    <input type="date" class="input" name="date_start" value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}" required>
                </div>
                @if ($errors->has('date_start'))
                    <p class="help is-danger">{{ $errors->first('date_start') }}</p>
                @endif
            </div>
            <div class="field">
                <div class="control">
                    <label class="label">End Date*</label>
                    <input type="date" class="input" name="date_end" value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}">
                </div>
                @if ($errors->has('date_end'))
                    <p class="help is-danger">{{ $errors->first('date_end') }}</p>
                @endif
            </div>
            <div class="field">
                <div class="control">
                    <label class="label">Status*</label>
                    <div class="select">
                        <select name="status">
                            @foreach ($statuses as $status)
                                <option value="{{ $status }}">{{ ucfirst($status) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @if ($errors->has('status'))
                    <p class="help is-danger">{{ $errors->first('status') }}</p>
                @endif
            </div>
            <div class="field">
                <input type="submit" class="button is-info" value="Submit"/>
                <a href="{{ route('exams.index') }}" class="button is-info is-inverted">Go back to exams</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop

