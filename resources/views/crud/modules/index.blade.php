@extends('layout.master')
@include('include.blade-components')



@section('page_title' , 'modules')

@php
    $indexes =[


           [
               'name'=> 'liste des modules',
               'route'=> route('modules.index')
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
        page-tittle="modules"
        :indexes="$indexes"
    />

@endsection
@section('content')
    @bind( $collection )
        <x-table.data-table
            :actions="$actions"
            :heads="$heads"
            edit-route="modules.show"
            delete-route="modules.delete"
            :more-routes="[
                [
                    'name' => 'Liste matieres',
                    'route' => 'matieres.index',
                    'paras' => [
                                [
                                    'idM' => null
                                   
                                ],
                                [
                                    
                                    'back'=>url('/modules')
                                ]
                            ],
                    'blank' => true,
                ],
                ]"
        />
    @endBinding
@endsection


