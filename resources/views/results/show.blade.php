@extends('layouts.app')

@section('title')
View Results - UP Online Examination System
@endsection

@section('content')
<div class="column">
    <h3 class="title is-3">View Results</h3>

    <div class="columns">
        <div class="column is-two-thirds">
            <div class="table-container">
                <table class="table is-fullwidth">
                    @if(!Auth::user()->isAdmin())
                    <tr>
                        <th>Name</th>
                        <td>{{ $test->user->name or '' }} ({{ $test->user->email or '' }})</td>
                    </tr>
                    @endif
                    <tr>
                        <th>Course</th>
                        <td>{{ $exam->title }} - {{ $exam->name }}</td>
                    </tr>
                    <tr>
                        <th>@lang('quickadmin.results.fields.date')</th>
                        <td>{{ $test->created_at or '' }}</td>
                    </tr>
                    <tr>
                        <th>@lang('quickadmin.results.fields.result')</th>
                        <td>{{ $test->result }}/{{ $totalItems }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="columns">
        <div class="column">
            <div class="column is-two-thirds">
                <?php $count = 0; ?>
                @foreach ($results as $result)
                <article class="panel is-link">
                    <p class="panel-heading">Question #{{ ++$count }}</p>
                    <input type="hidden" name="questions[{{ $count }}]" value="{{ $q->id }}" />
                    <div class="panel-block pt-3 pb-5">
                        <p class="control has-text-weight-medium">
                            {{ nl2br($result->question->question_text) }}
                        </p>
                    </div>

                    @if ($q->question->code_snippet != '')
                    <div class="panel-block pt-3">
                        <p class="control">
                            {{ nl2br($result->code_snippet) }}
                        </p>
                    </div>
                    @endif

                    <div class="panel-block content">
                        <ul>
                        @foreach($result->question->options as $option)
                            @if ($option->correct == 1)
                            <li class="has-text-weight-bold">
                                {{ $option->option }} 
                                @if ($result->option_id == $option->id )
                                    <span class="has-text-success">(your answer)</span>
                                @endif
                                <span class="has-text-success"><i class="fa fa-check"></i></span>
                            </li>
                            @elseif ($option->correct !== 1 && $result->option_id == $option->id)
                            <li class="has-text-weight-bold">
                                {{ $option->option }} 
                                <span class="has-text-danger"><i class="fa fa-times-circle"></i></span>
                            </li>
                            @else
                            <li>
                                {{ $option->option }}
                            </li>
                            @endif
                        @endforeach
                        </ul>
                    </div>
                    <div class="panel-block">
                        <p class="control">
                            <strong>Answer Explanation</strong><br/>
                            {!! $result->question->answer_explanation  !!}
                        </p>
                    </div>
                    <div class="panel-block">
                        <p class="control">
                            Read more: <a href="{{ $result->question->more_info_link }}" target="_blank">{{ $result->question->more_info_link }}</a>
                        </p>
                    </div>
                </article>
                @endforeach
                <div class="field">
                    <a href="{{ route('home') }}" class="button is-primary">Go back to home</a>
                </div>
            </div>
            <div class="column"></div>
        </div>
    </div>
</div>
   
@stop
