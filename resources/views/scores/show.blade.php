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
                    <li><a href="{{ route('exams.show', $exam->id) }}">Questions</a></li>
                    <li class="is-active"><a>Scores</a></li>
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
                            <th>Name</th>
                            <th>Score</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($tests) > 0)
                            <?php $count = 0; ?>
                            @foreach ($tests as $test)
                                <tr data-entry-id="{{ $test->id }}">
                                    <td style="text-align:center;">{{ ++$count }}</td>
                                    <td><small>{{ $test->name }}</small></td>
                                    <td>
                                        {{ $test->result }}/{{ $test->totalItems }}
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
                            <td colspan="5">Displaying {{ count($tests) }} item(s)</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@stop