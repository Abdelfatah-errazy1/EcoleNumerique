@extends('layout.master')
@include('include.blade-components')



@section('page_title' , 'chapitres')
@php
    $indexes =[


           [
               'name'=> 'liste des chapitres',
               'route'=> route('chapitres.index')
           ]

        ];
    if(isset($back)){
        array_unshift($indexes ,[
               'name'=> 'go back',
               'route'=> $back
           ] );
    }
@endphp
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="chapitres"
        :indexes="$indexes"
    />

@endsection
@section('content')
    @bind( $collection )
        <x-table.data-table
            :actions="$actions"
            :heads="$heads"
            edit-route="chapitres.show"
            delete-route="chapitres.delete"
           
        />
    @endBinding
@endsection


