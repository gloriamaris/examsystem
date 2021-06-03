@extends('layouts.app')

@section('title')
View Results - UP Online Examination System
@endsection

@section('content')
<div class="column">
    <h3 class="title is-3">Dashboard</h3>

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
                            <li class="has-text-weight-bold has-text-success">
                                {{ $option->option }} 
                                {{ $result->option_id == $option->id ? "(your answer)" : "" }}
                                (correct answer)
                            </li>
                            @elseif ($option->correct !== 1 && $result->option_id == $option->id)
                            <li class="has-text-weight-bold">
                                {{ $option->option }} 
                                (your answer)
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
