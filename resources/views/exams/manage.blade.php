@extends('layouts.app')

@section('title')
Manage Exam - UP Online Examination System
@endsection

@section('content')
<div class="column">
    <h3 class="title is-3">Manage Exam Details</h3>

    <div class="columns">
        <div class="column">
            <div class="field">
                <a href="{{ route('examquestions.show', [$exam->id]) }}" class="button is-info mb-5"><i class="fa fa-plus mr-1"></i>Add question</a>
                <a href="{{ route('exams.index') }}" class="button is-info is-inverted">Go back to exams</a>
            </div>
            <div class="tabs">
                <ul>
                    <li class="is-active"><a>Questions</a></li>
                    <li><a>Scores</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="columns">
        {{ $options }}
        <div class="column">
            <div class="table-container">
                <table class="table is-narrow is-fullwidth {{ count($questions) > 0 ? 'tbl' : '' }}">
                    <thead>
                        <tr>
                            <th style="text-align:center;">No.</th>
                            <th>@lang('quickadmin.questions.fields.question-text')</th>
                            <th>@lang('quickadmin.questions.fields.options')</th>
                            <th>@lang('quickadmin.questions.fields.answer-explanation')</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($questions) > 0)
                            <?php $count = 0; ?>
                            @foreach ($questions as $question)
                                <tr data-entry-id="{{ $question->id }}">
                                    <td style="text-align:center;">{{ ++$count }}</td>
                                    <td><small>{{ $question->question_text }}</small></td>
                                    <td width="20%">
                                        <ul>
                                        @foreach ($options[$question->id] as $opt)
                                            @foreach ($opt as $o)
                                                <li><span class="{{ $o->correct == true ? "has-text-success has-text-weight-bold" : '' }} is-size-7">{{ $o->option }}</span></li>
                                            @endforeach
                                        @endforeach
                                        </ul>
                                    </td>
                                    <td><small>{{ $question->answer_explanation }}</small></td>
                                    <td width="15%">
                                        <a href="{{ route('examquestions.edit',[$question->id]) }}" class="button is-small is-link is-outlined">@lang('quickadmin.edit')</a>
                                        
                                        {!! Form::open(array(
                                            'style' => 'display: inline-block;',
                                            'method' => 'DELETE',
                                            'onsubmit' => "return confirm('".trans("quickadmin.are_you_sure")."');",
                                            'route' => ['questions.destroy', $question->id])) !!}
                                        {!! Form::submit(trans('quickadmin.delete'), array('class' => 'button is-small is-inverted is-danger')) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5">@lang('quickadmin.no_entries_in_table')</td>
                            </tr>
                        @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4">Displaying {{ count($questions) }} item(s)</td>
                            <td colspan="1">
                                <a href="#" class="button is-inverted is-small is-info" disabled>Prev</a>
                                <a href="#" class="button is-inverted is-small is-info">Next</a>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@stop