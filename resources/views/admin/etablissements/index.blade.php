@extends('layout.master')
@include('include.blade-components')


@section('page_title' , ucwords(trans('elements.liste_des_etablissements')))
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle=trans('elements.liste_des_etablissements')
        :indexes="[

            [
               'name'=> trans('elements.liste_des_etablissements'),
               'route'=> route('admin.etablissements.index')
           ],
        ]"
    />

@endsection
@section('content')
    @bind( $collection )
        <x-table.data-table
            :actions="$actions"
            :heads="$heads"
            edit-route="admin.etablissements.show"
            delete-route="admin.etablissements.delete"
        />
    @endBinding
@endsection


