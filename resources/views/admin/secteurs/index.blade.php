@extends('layout.master')
@include('include.blade-components')
@section('page_title' , trans('pages/admin/secteurs.index_page_title'))
@section('breadcrumb')
    <x-group.bread-crumb
        :page-tittle=" trans('pages/admin/secteurs.index_details_title')"
        :indexes="[
           [
               'name'=> trans('pages/admin/secteurs.index_page_title'),
               'route'=> route('admin.secteurs.index')
           ],
        ]"
    />

@endsection


@section('content')
    @bind( $collection )
    <x-table.data-table
        :actions="$actions"
        :heads="$heads"
        edit-route="admin.secteurs.show"
        delete-route="admin.secteurs.delete"

    />
    @endBinding
@endsection


