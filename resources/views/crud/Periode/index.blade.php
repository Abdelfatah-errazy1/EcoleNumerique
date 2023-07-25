@extends('layout.master')
@include('include.blade-components')



@section('page_title', 'periodes list')

@section('breadcrumb')
    <x-group.bread-crumb page-tittle="liste des periodes" :indexes="[
        [
            'name' => 'liste des periodes',
            'route' => route('periodes.index'),
        ],
    ]" />

@endsection

@section('content')
    @bind($collection)
        <x-table.data-table :actions="$actions" :heads="$heads" edit-route="periodes.show" delete-route="periodes.delete" />
    @endBinding
@endsection
