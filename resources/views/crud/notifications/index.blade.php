@extends('layout.master')
@include('include.blade-components')



@section('page_title' , 'liste notifications ')
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="liste des notifications"
        :indexes="[

            [
               'name'=> 'liste des notifications',
               'route'=> route('notifications.index')
           ],
        ]"
    />

@endsection
@section('content')
    @bind( $collection )
        <x-table.data-table
            :actions="$actions"
            :heads="$heads"
            edit-route="notifications.show"
            delete-route="notifications.delete"
        />
    @endBinding
@endsection


