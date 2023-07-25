@extends('layout.master')
@include('include.blade-components')
@section('page_title' ,  trans('elements.liste_des_abonnements'))
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle={{trans('elements.liste_des_abonnements')}},
        :indexes="[
           [
               'name'=> trans('elements.liste_des_abonnements'),
               'route'=> route('admin.abonnements.index'),
           ],
        ]"
    />

@endsection
@section('content')
    @bind( $collection )
    <x-table.data-table
        :actions="$actions"
        :heads="$heads"
        edit-route="admin.abonnements.show"
        delete-route="admin.abonnements.delete"
    />
    @endBinding
@endsection


