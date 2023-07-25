
@extends('layout.master')
@include('include.blade-components')



@section('page_title' , trans('words.Batiments'))
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle=""
        :indexes="[

            [
               'name'=> trans('words.'),
               'route'=> route('Batiments.index')
           ],
        ]"
    />

@endsection
@section('content')
    @bind( $collection )
        <x-table.data-table
            :actions="$actions"
            :heads="$heads"
            edit-route="Batiments.show"
            delete-route="Batiments.delete"
        />
    @endBinding
@endsection


