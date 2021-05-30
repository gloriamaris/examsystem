@extends('layouts.app')

@section('title')
Exams - UP Online Examination System
@endsection

@section('content')
<div class="column">
    <h3 class="title is-3">Exams</h3>

    <div class="columns">
        <div class="column">
            <a href="{{ route('exams.create') }}" class="button is-info mb-5"><i class="fa fa-plus mr-1"></i>Add new exam</a>
            <div class="table-container">
                <table class="table is-fullwidth {{ count($exams) > 0 ? 'tbl' : '' }}">
                    <thead>
                        <tr>
                            <th style="text-align:center;">No.</th>
                            <th>@lang('quickadmin.exams.fields.course')</th>
                            <th>@lang('quickadmin.exams.fields.name')</th>
                            <th>@lang('quickadmin.exams.fields.schedule')</th>
                            <th>@lang('quickadmin.exams.fields.status')</th>
                            <th>@lang('quickadmin.exams.fields.students')</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($exams) > 0)
                            <?php $count = 0; ?>
                            @foreach ($exams as $exam)
                                <tr data-entry-id="{{ $exam->id }}">
                                    <td style="text-align:center;">{{ ++$count }}</td>
                                    <td>{{ $exam->title }}</td>
                                    <td>{{ $exam->name }}</td>
                                    <td>{{ date('j F, Y', strtotime($exam->date_start)) }} - {{ date('j F, Y', strtotime($exam->date_end)) }}</td>
                                    <td><span class="tag {{ $exam->status == "open" ? "is-primary" : "" }} is-light">{{ $exam->status }}</span></td>
                                    <td>TODO</td>
                                    <td>
                                        <a href="{{ route('exams.show', $exam->id) }}" class="button is-small is-link is-outlined">Manage</a>
                                        <a href="{{ route('exams.edit',[$exam->id]) }}" class="button is-small is-link is-outlined">@lang('quickadmin.edit')</a>
                                        
                                        {!! Form::open(array(
                                            'style' => 'display: inline-block;',
                                            'method' => 'DELETE',
                                            'onsubmit' => "return confirm('".trans("quickadmin.are_you_sure")."');",
                                            'route' => ['exams.destroy', $exam->id])) !!}
                                        {!! Form::submit(trans('quickadmin.delete'), array('class' => 'button is-small is-inverted is-danger')) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7">@lang('quickadmin.no_entries_in_table')</td>
                            </tr>
                        @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6">Displaying {{ count($exams) }} item(s)</td>
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