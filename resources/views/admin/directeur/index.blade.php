@extends('layout.master')
@include('include.blade-components')



@section('page_title' , ucwords(trans('elements.liste_des_directeurs')))
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="{{trans('elements.liste_des_directeurs')}}"
        :indexes="[

            [
               'name'=> trans('elements.liste_des_directeurs'),
               'route'=> route('admin.directeur.index')
           ],
        ]"
    />

@endsection
@section('content')
    @bind( $collection )
        <x-table.data-table
            :actions="$actions"
            :heads="$heads"
            edit-route="admin.directeur.show"
            delete-route="admin.directeur.delete"
        />
    @endBinding
@endsection


