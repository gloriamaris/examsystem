@extends('layouts.app')

@section('title')
Add Question - UP Online Examination System
@endsection

@section('content')
<div class="column">
    <h3 class="title is-3">Add Question</h3>

    <div class="columns">
        <div class="column">
            <nav class="breadcrumb" aria-label="breadcrumbs">
                <ul>
                    <li><a href="{{ route('exams.index') }}">Exams</a></li>
                    <li><a href="{{ route('exams.show', $exam->id) }}">{{ $topic->title }}</a></li>
                    <li class="is-active"><a href="#" aria-current="page">Question</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="columns">
        <div class="column is-half">
            {!! Form::open(['method' => 'POST', 'route' => ['examquestions.store']]) !!}
            <input type="hidden" name="topic_id" value="{{ $exam->topic_id }}"/>
            <input type="hidden" name="exam_id" value="{{ $exam->id }}"/>
            <div class="field">
                <label class="label">Question text*</label>
                <div class="control">
                    <textarea name="question_text" class="textarea {{ $errors->has('question_text') ? 'is-danger' : '' }}" placeholder="What's on your mind?" rows="10" required>{{  old('question_text') }}</textarea>
                </div>
                @if ($errors->has('question_text'))
                    <p class="help is-danger">{{ $errors->first('question_text') }}</p>
                @endif
            </div>

            <div class="field">
                <label class="label">Option #1</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input {{ $errors->has('option1') ? 'is-danger' : '' }}" name="option1" type="text" placeholder="Enter an option" value="{{ old('option1') }}" required>
                    <span class="icon is-small is-left">
                        <i class="fas fa-lightbulb"></i>
                    </span>
                </div>
                @if ($errors->has('option1'))
                    <p class="help is-danger">{{ $errors->first('option1') }}</p>
                @endif
            </div>
            <div class="field">
                <label class="label">Option #2</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input {{ $errors->has('option2') ? 'is-danger' : '' }}" name="option2" type="text" placeholder="Enter an option" value="{{ old('option2') }}" required>
                    <span class="icon is-small is-left">
                        <i class="fas fa-lightbulb"></i>
                    </span>
                </div>
                @if ($errors->has('option2'))
                    <p class="help is-danger">{{ $errors->first('option2') }}</p>
                @endif
            </div>
            <div class="field">
                <label class="label">Option #3</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input {{ $errors->has('option3') ? 'is-danger' : '' }}" name="option3" type="text" placeholder="Enter an option" value="{{ old('option3') }}" required>
                    <span class="icon is-small is-left">
                        <i class="fas fa-lightbulb"></i>
                    </span>
                </div>
                @if ($errors->has('option3'))
                    <p class="help is-danger">{{ $errors->first('option3') }}</p>
                @endif
            </div>
            <div class="field">
                <label class="label">Option #4</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input {{ $errors->has('option4') ? 'is-danger' : '' }}" name="option4" type="text" placeholder="Enter an option" value="{{ old('option4') }}" required>
                    <span class="icon is-small is-left">
                        <i class="fas fa-lightbulb"></i>
                    </span>
                </div>
                @if ($errors->has('option4'))
                    <p class="help is-danger">{{ $errors->first('option4') }}</p>
                @endif
            </div>
            <div class="field">
                <label class="label">Option #5</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input {{ $errors->has('option5') ? 'is-danger' : '' }}" name="option5" type="text" placeholder="Enter an option" value="{{ old('option5') }}" required>
                    <span class="icon is-small is-left">
                        <i class="fas fa-lightbulb"></i>
                    </span>
                </div>
                @if ($errors->has('option5'))
                    <p class="help is-danger">{{ $errors->first('option5') }}</p>
                @endif
            </div>
            <div class="field">
                <label class="label">Correct Answer</label>
                <div class="control">
                    <div class="select is-fullwidth">
                        <select name="correct">
                            @foreach ($options as $option)
                                <option value="option{{ $option }}">Option #{{ $option }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @if ($errors->has('option5'))
                    <p class="help is-danger">{{ $errors->first('option5') }}</p>
                @endif
            </div>
            <div class="field">
                <label class="label">Code Snippet</label>
                <div class="control">
                    <textarea name="code_snippet" class="textarea {{ $errors->has('code_snippet') ? 'is-danger' : '' }}" placeholder="Enter your code snippet" rows="10">{{  old('code_snippet') }}</textarea>
                </div>
                @if ($errors->has('code_snippet'))
                    <p class="help is-danger">{{ $errors->first('code_snippet') }}</p>
                @endif
            </div>
            <div class="field">
                <label class="label">Answer Explanation</label>
                <div class="control">
                    <textarea name="answer_explanation" class="textarea {{ $errors->has('answer_explanation') ? 'is-danger' : '' }}" placeholder="Enter answer explanation" rows="10">{{  old('answer_explanation') }}</textarea>
                </div>
                @if ($errors->has('answer_explanation'))
                    <p class="help is-danger">{{ $errors->first('answer_explanation') }}</p>
                @endif
            </div>
            <div class="field">
                <label class="label">More info URL</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input {{ $errors->has('more_info_link') ? 'is-danger' : '' }}" name="more_info_link" type="text" placeholder="Enter more information here" value="{{ old('more_info_link') }}">
                    <span class="icon is-small is-left">
                        <i class="fas fa-globe"></i>
                    </span>
                </div>
                @if ($errors->has('more_info_link'))
                    <p class="help is-danger">{{ $errors->first('more_info_link') }}</p>
                @endif
            </div>
            <div class="field">
                <input type="submit" class="button is-info" value="Submit"/>
                <a href="{{ route('exams.show', $exam->id) }}" class="button is-info is-inverted">Go back to course page</a>
            </div>
            {!! Form::close() !!}
        </div>
        <div class="column"></div>
    </div>
</div>
@stop

