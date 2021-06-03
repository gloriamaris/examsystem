@extends('layouts.app')

@section('title')
Create Exam - UP Online Examination System
@endsection

@section('content')
<style>
    .timer-section {
        position: fixed;
        width: 20%;
    }
</style>

<div class="column">
    <h3 class="title is-3">Take Examination</h3>

    <div class="columns">
        <div class="column is-two-thirds">
            <article class="message is-warning">
                <div class="message-body">
                    You will be given one 10 minutes to answer the exam questions. Do not attempt to share the exam questions to your classmates. In the event that they will get a grade higher than yours - it is not my fault.
                    <br/><br/>Good luck!
                </div>
            </article>
            
            {!! Form::open(['method' => 'POST', 'route' => ['tests.store']]) !!}
            <?php $count = 0; ?>
            @foreach ($questions as $q)
            <article class="panel is-link">
                <p class="panel-heading">
                    Question #{{ ++$count }}
                </p>
                <input type="hidden" name="questions[{{ $count }}]" value="{{ $q->id }}" />
                <div class="panel-block pt-5 pb-5">
                    <p class="control has-text-weight-medium">
                        {{ nl2br($q->question_text) }}
                    </p>
                </div>
                @if ($q->code_snippet != '')
                <div class="panel-block pt-3 pb-5">
                    <p class="control has-text-weight-medium">
                        {{ nl2br($q->code_snippet) }}
                    </p>
                </div>
                @endif
                @foreach ($q->options as $o)
                <a class="panel-block">
                    <p class="control">
                        <label class="radio">
                            <small>
                                <input class="mr-3" name="answers[{{ $q->id }}]" type="radio" value="{{ $o->id }}">
                                {{ $o->option }}
                            </small>
                        </label>
                        </p>
                    </a>
                @endforeach
            </article>
            @endforeach
            <div class="field">
                <input type="submit" class="button is-info is-fullwidth" value="Submit"/>
            </div>
            {!! Form::close() !!}
        </div>
        <div class="column">
            <div class="card timer-section">
                <div class="card-content">
                    <div class="content">
                        <h1 id="timer" class="is-size-1 has-text-centered has-text-weight-bold has-text-info">00:10:00</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('javascript')
<script>
    let timer2 = "10:01";
    let interval = setInterval(function() {
        let timer = timer2.split(':');
        //by parsing integer, I avoid all extra string processing
        let minutes = parseInt(timer[0], 10);
        let seconds = parseInt(timer[1], 10);

        --seconds;
        
        minutes = (seconds < 0) ? --minutes : minutes;
        
        if (minutes < 0) clearInterval(interval);
        
        seconds = (seconds < 0) ? 59 : seconds;
        seconds = (seconds < 10) ? '0' + seconds : seconds;
        
        //minutes = (minutes < 10) ?  minutes : minutes;
        $('#timer').html('00:' + minutes + ':' + seconds);
        timer2 = minutes + ':' + seconds;
    }, 1000);
</script>
@stop