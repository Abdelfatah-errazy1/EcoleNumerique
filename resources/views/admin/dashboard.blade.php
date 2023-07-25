@extends('layout.master')
@include('include.blade-components')
@section('page_title' , ucwords('Dashboard'))
@section('content')
    <x-form.card col="col-12 row" :title="trans('Liste des Administrateurs')">
        @include('admin.admins.table-admins-Included' , ['admins' => $admins['admins'] , 'actions' => $admins['actions']])
    </x-form.card>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/pages/admin/admins.js') }}"> </script>
@endpush




