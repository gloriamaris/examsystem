@extends('layouts.app')

@section('title')
Edit Question - UP Online Examination System
@endsection

@section('content')
<div class="column">
    <h3 class="title is-3">Edit Question</h3>
    <div class="columns">
        <div class="column">
            <nav class="breadcrumb" aria-label="breadcrumbs">
                <ul>
                    <li><a href="{{ route('exams.index') }}">Exams</a></li>
                    <li><a href="{{ route('exams.show', $question->exam_id) }}">{{ $topic->title }}</a></li>
                    <li class="is-active"><a href="#" aria-current="page">Question</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="columns">
        <div class="column is-half">
            {!! Form::open(['method' => 'PUT', 'route' => ['examquestions.update', $question->id]]) !!}
            <input type="hidden" name="topic_id" value="{{ $question->topic_id }}"/>
            <input type="hidden" name="exam_id" value="{{ $question->exam_id }}"/>
            <div class="field">
                <label class="label">Question text*</label>
                <div class="control">
                    <textarea name="question_text" class="textarea {{ $errors->has('question_text') ? 'is-danger' : '' }}" placeholder="What's on your mind?" rows="10" required>{{  $question->question_text }}</textarea>
                </div>
                @if ($errors->has('question_text'))
                    <p class="help is-danger">{{ $errors->first('question_text') }}</p>
                @endif
            </div>

            <?php 
                $count = 0;
                $correctId = -1;
            ?>
            @foreach ($questionsOption as $qo)
            <?php 
                $optionName = 'option' + ++$count;

                if ($qo->correct === 1) {
                    $correctId = $count;
                } 
            ?>

            <div class="field">
                <label class="label">Option #{{ $count }}</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input {{ $errors->has($optionName) ? 'is-danger' : '' }}" name="option{{ $count }}" type="text" placeholder="Enter an option" value="{{ $qo->option }}" required>
                    <span class="icon is-small is-left">
                        <i class="fas fa-lightbulb"></i>
                    </span>
                </div>
                @if ($errors->has($optionName))
                    <p class="help is-danger">{{ $errors->first($optionName) }}</p>
                @endif
            </div>
            @endforeach

            <div class="field">
                <label class="label">Correct Answer</label>
                <div class="control">
                    <div class="select is-fullwidth">
                        <select name="correct">
                            @foreach ($options as $option)
                                <option value="option{{ $option }}" {{ $correctId == $option ? 'selected' : ''}}>Option #{{ $option }}</option>
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
                    <textarea name="code_snippet" class="textarea {{ $errors->has('code_snippet') ? 'is-danger' : '' }}" placeholder="Enter your code snippet" rows="10">{{  $question->code_snippet }}</textarea>
                </div>
                @if ($errors->has('code_snippet'))
                    <p class="help is-danger">{{ $errors->first('code_snippet') }}</p>
                @endif
            </div>
            <div class="field">
                <label class="label">Answer Explanation</label>
                <div class="control">
                    <textarea name="answer_explanation" class="textarea {{ $errors->has('answer_explanation') ? 'is-danger' : '' }}" placeholder="Enter answer explanation" rows="10">{{  $question->answer_explanation }}</textarea>
                </div>
                @if ($errors->has('answer_explanation'))
                    <p class="help is-danger">{{ $errors->first('answer_explanation') }}</p>
                @endif
            </div>
            <div class="field">
                <label class="label">More info URL</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input {{ $errors->has('more_info_link') ? 'is-danger' : '' }}" name="more_info_link" type="text" placeholder="Enter more information here" value="{{ $question->more_info_link }}">
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
                <a href="{{ route('exams.show', $question->exam_id) }}" class="button is-info is-inverted">Go back to course page</a>
            </div>
            {!! Form::close() !!}
        </div>
        <div class="column"></div>
    </div>
</div>
@stop

