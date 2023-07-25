@extends('layout.master')
@include('include.blade-components')
@section('page_title' ,  trans('pages/admin/admins.index_page_title'))
@section('breadcrumb')
    <x-group.bread-crumb
        :page-tittle="trans('pages/admin/admins.index_page_details_title')"
        :indexes="[
           [
               'name'=> trans('pages/admin/admins.index_page_details_title'),
               'route'=> route('admin.admins.index'),
           ],
        ]"
    />
@endsection
@section('content')
  @include('admin.admins.table-admins-Included')
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/pages/admin/admins.js') }}"> </script>
@endpush


