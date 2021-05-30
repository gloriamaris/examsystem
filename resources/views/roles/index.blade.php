@extends('layouts.app')

@section('title')
Roles - UP Online Examination System
@endsection

@section('content')
<div class="column">
    <h3 class="title is-3">Users</h3>

    <div class="columns">
        <div class="column">
            <a href="{{ route('roles.create') }}" class="button is-info mb-5"><i class="fa fa-plus mr-1"></i>Add new role</a>
            <div class="table-container">
                <table class="table is-fullwidth {{ count($users) > 0 ? 'tbl' : '' }}">
                    <thead>
                        <tr>
                            <th style="text-align:center;">No.</th>
                            <th>@lang('quickadmin.roles.fields.title')</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($roles) > 0)
                            <?php $count = 0; ?>
                            @foreach ($roles as $role)
                                <tr data-entry-id="{{ $user->id }}">
                                    <td style="text-align:center;">{{ ++$count }}</td>
                                    <td>{{ $role->title }}</td>
                                    <td>
                                        @if ($role->id !== 1)
                                        <a href="{{ route('roles.edit',[$role->id]) }}" class="button is-small is-link is-outlined">@lang('quickadmin.edit')</a>
                                        
                                        {!! Form::open(array(
                                            'style' => 'display: inline-block;',
                                            'method' => 'DELETE',
                                            'onsubmit' => "return confirm('".trans("quickadmin.are_you_sure")."');",
                                            'route' => ['roles.destroy', $role->id])) !!}
                                        {!! Form::submit(trans('quickadmin.delete'), array('class' => 'button is-small is-inverted is-danger')) !!}
                                        {!! Form::close() !!}
                                        @endif
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
                            <td colspan="2">Displaiying {{ count($users) }} item(s)</td>
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