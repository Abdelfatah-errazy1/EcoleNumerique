
@extends('layout.master')
@include('include.blade-components')



@section('page_title' , trans('words.TypesSalles'))
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle=""
        :indexes="[

            [
               'name'=> trans('words.TypesSalles'),
               'route'=> route('TypesSalles.index')
           ],
        ]"
    />

@endsection
@section('content')
    @bind( $collection )
        <x-table.data-table
            :actions="$actions"
            :heads="$heads"
            edit-route="TypesSalles.show"
            delete-route="TypesSalles.delete"
        />
    @endBinding
@endsection


