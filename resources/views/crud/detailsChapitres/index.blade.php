@extends('layout.master')
@include('include.blade-components')



@section('page_title' , 'detailsChapitres')
@php
    $indexes =[


           [
               'name'=> 'liste des detailsChapitres',
               'route'=> route('detailsChapitres.index')
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
        page-tittle="detailsChapitres"
        :indexes="$indexes"
    />

@endsection
@section('content')
    @bind( $collection )
        <x-table.data-table
            :actions="$actions"
            :heads="$heads"
            edit-route="detailsChapitres.show"
            delete-route="detailsChapitres.delete"
           
        />
    @endBinding
@endsection


