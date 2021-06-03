@extends('layouts.app')

@section('title')
Add Role - UP Online Examination System
@endsection

@section('content')
<div class="column">
    <h3 class="title is-3">Enroll Student</h3>

    <div class="columns">
        <div class="column is-half">
            {!! Form::open(['method' => 'POST', 'route' => ['roles.store']]) !!}
            <div class="field">
                <label class="label">Student*</label>
                <div class="control">
                    <div class="select is-fullwidth">
                        <select name="topic_id">
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
                        <select name="topic_id">
                            @foreach ($semesters as $sem)
                            <option value="{{ $sem }}">{{ $sem }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="field">
                <input type="submit" class="button is-info" value="Submit"/>
                <a href="{{ route('roles.index') }}" class="button is-info is-inverted">Go back to course</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop

