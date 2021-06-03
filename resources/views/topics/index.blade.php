@extends('layouts.app')

@section('title')
Courses - UP Online Examination System
@endsection

@section('content')
<div class="column">
    <h3 class="title is-3">Courses</h3>
    
    <div class="columns">
        <div class="column">
            <a href="{{ route('topics.create') }}" class="button is-info mb-5"><i class="fa fa-plus mr-1"></i>Add new course</a>

            <div class="table-container">
                <table class="table is-fullwidth {{ count($topics) > 0 ? 'tbl' : '' }}">
                    <thead>
                        <tr>
                            <th style="text-align:center;">No.</th>
                            <th>@lang('quickadmin.topics.fields.title')</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($topics) > 0)
                            <?php $count = 0; ?>
                            @foreach ($topics as $topic)
                                <tr data-entry-id="{{ $topic->id }}">
                                    <td style="text-align:center;">{{ ++$count }}</td>
                                    <td>{{ $topic->title }}</td>
                                    <td>
                                        <a href="{{ route('courses.show',[$topic->id]) }}" class="button is-small is-link is-outlined">Manage</a>
                                        <a href="{{ route('topics.edit',[$topic->id]) }}" class="button is-small is-link is-outlined">@lang('quickadmin.edit')</a>
                                        
                                        {!! Form::open(array(
                                            'style' => 'display: inline-block;',
                                            'method' => 'DELETE',
                                            'onsubmit' => "return confirm('".trans("quickadmin.are_you_sure")."');",
                                            'route' => ['topics.destroy', $topic->id])) !!}
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
                            <td colspan="3">Displaying {{ count($topics) }} item(s)</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@stop