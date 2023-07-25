@extends('layout.master')
@include('include.blade-components')



@section('page_title', 'blocs list')

@section('breadcrumb')
    <x-group.bread-crumb page-tittle="liste des blocs" :indexes="[
        [
            'name' => 'liste des blocs',
            'route' => route('blocs.index'),
        ],
    ]" />

@endsection

@section('content')
    @bind($collection)
        <x-table.data-table :actions="$actions" :heads="$heads" edit-route="blocs.show" delete-route="blocs.delete" />
    @endBinding
@endsection
