@extends('layout.master')
@include('include.blade-components')

@section('page_title' , 'salle list')
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="liste des salles"
        :indexes="[

            [
               'name'=> 'liste des salles',
               'route'=> route('salles.index')
           ],
        ]"
    />

@endsection
@section('content')
    @bind( $collection )
    <x-table.data-table
        :actions="$actions"
        :heads="$heads"
        edit-route="salles.show"
        delete-route="salles.delete"
    />
    @endBinding
@endsection
