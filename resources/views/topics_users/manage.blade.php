@extends('layouts.app')

@section('title')
Course - UP Online Examination System
@endsection

@section('content')
<div class="column">
    <h3 class="title is-3">Manage {{ $topic->title }}</h3>
    
    <div class="columns">
        <div class="column">
            <nav class="breadcrumb" aria-label="breadcrumbs">
                <ul>
                    <li><a href="{{ route('topics.index') }}">Courses</a></li>
                    <li><a href="{{ route('topics.show', $exam->id) }}">{{ $topic->title }}</a></li>
                    <li class="is-active"><a href="#" aria-current="page">Students</a></li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="columns">
        <div class="column">
            <a href="{{ route('courses.edit', $topic->id) }}" class="button is-info mb-5"><i class="fa fa-plus mr-1"></i>Enroll student</a>

            <div class="table-container">
                <table class="table is-fullwidth {{ count($topics) > 0 ? 'tbl' : '' }}">
                    <thead>
                        <tr>
                            <th style="text-align:center;">No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Semester</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($students) > 0)
                            <?php $count = 0; ?>
                            @foreach ($students as $student)
                                <tr data-entry-id="{{ $student->id }}">
                                    <td style="text-align:center;">{{ ++$count }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->semester }}</td>
                                    <td>
                                        {!! Form::open(array(
                                            'style' => 'display: inline-block;',
                                            'method' => 'DELETE',
                                            'onsubmit' => "return confirm('".trans("quickadmin.are_you_sure")."');",
                                            'route' => ['courses.destroy', $student->id])) !!}
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
                            <td colspan="5">Displaying {{ count($topics) }} item(s)</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@stop