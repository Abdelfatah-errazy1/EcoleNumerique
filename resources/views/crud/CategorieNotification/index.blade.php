
@extends('layout.master')
@include('include.blade-components')



@section('page_title' , 'Liste des Catégories de Notifications')
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle=""
        :indexes="[

            [
               'name'=> 'Liste des Catégories de Notifications',
               'route'=> route('CategoriesNotifications.index')
           ],
        ]"
    />

@endsection
@section('content')
    @bind( $collection )
        <x-table.data-table
            :actions="$actions"
            :heads="$heads"
            edit-route="CategoriesNotifications.show"
            delete-route="CategoriesNotifications.delete"
        />
    @endBinding
@endsection


