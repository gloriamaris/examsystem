@extends('layouts.app')

@section('title')
Enroll - UP Online Examination System
@endsection

@section('content')
<div class="column">
    <h3 class="title is-3">Enroll Student</h3>
    {{ $enrolledStudents }}
    <div class="columns">
        <div class="column is-half">
            {!! Form::open(['method' => 'PUT', 'route' => ['courses.update', $topic->id]]) !!}
            <input name="topic_id" value="{{ $topic->id }}" hidden/>
            <div class="field">
                <label class="label">Student*</label>
                <div class="control">
                    <div class="select is-fullwidth">
                        <select name="user_id">
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}">{{ $student->name }} - {{ $student->email }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="field">
                <label class="label">Semester*</label>
                <div class="control">
                    <div class="select is-fullwidth">
                        <select name="semester">
                            @foreach ($semesters as $sem)
                            <option value="{{ $sem }}">{{ $sem }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="field">
                <input type="submit" class="button is-info" value="Submit"/>
                <a href="{{ route('courses.show', $topic->id) }}" class="button is-info is-inverted">Go back to course</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop

