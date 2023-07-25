@extends('layout.master')
@include('include.blade-components')



@section('page_title' , 'matieres')
@php
    $indexes =[


           [
               'name'=> 'liste des matieres',
               'route'=> route('matieres.index')
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
        page-tittle="matieres"
        :indexes="$indexes"
    />
    {{-- @dd($back,$indexes) --}}

@endsection
@section('content')
    @bind( $collection )
        <x-table.data-table
            :actions="$actions"
            :heads="$heads"
            edit-route="matieres.show"
            delete-route="matieres.delete"
            :more-routes="[
                [
                    'name' => 'Liste chapitres',
                    'route' => 'chapitres.index',
                    'paras' => [[
                                    'idMat' => null
                                ],
                                [
                                    
                                    'back'=>url('/matieres')
                                ]],
                    'blank' => true,
                ],
                ]"
        />
    @endBinding
@endsection


