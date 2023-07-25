@extends('layout.master')
@include('include.blade-components')
@section('page_title' , ucwords(trans("elements.liste_des_centres_de_Formations")))
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="{{trans(" elements.liste_des_centres_de_Formations")}}"
        :indexes="[

            [
               'name'=> trans('elements.liste_des_centres_de_Formations'),
               'route'=> route('admin.centresFormations.index')
           ],
        ]"
    />

@endsection
@section('content')
    @bind( $collection )
        <x-table.data-table
            :actions="$actions"
            :heads="$heads"
            edit-route="admin.centresFormations.show"
            delete-route="admin.centresFormations.delete"
        />
    @endBinding
@endsection


