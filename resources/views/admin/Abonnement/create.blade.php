@extends('layout.master')
@include('include.blade-components')
@section('page_title' , trans('app.add'))
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="{{trans('app.add')}}" ,
        :indexes="[
        ['name'=> trans('elements.liste_des_abonnements') , 'route'=> route('admin.abonnements.index')],
        ['name'=> trans('app.add') ,     'current' =>true ],
    ]"
    />
@endsection
@section('content')

    <x-form.form
        method="post"
        action="{{ route('admin.abonnements.store') }}"
    >

        <x-form.card col="col-12" title="{{trans('app.add')}}">

            <x-form.input required col="col-12 col-sm-4" name="{{config('tables.abonnements.columns.title')}}" :label="ucwords(trans('elements.title'))"/>
            <x-form.input type="number" required col="col-12 col-sm-4" min="0" name="{{config('tables.abonnements.columns.tarif_vente')}}" :label="ucwords(trans('elements.tarif_vente'))"/>
            <x-form.input type="number" col="col-12 col-sm-4" min="0" name="{{config('tables.abonnements.columns.tarif_promo')}}" :label="ucwords(trans('elements.tarif_promo'))"/>
            <x-form.input type="number" min="0" required col="col-12 col-sm-6" name="{{config('tables.abonnements.columns.number_accounts_anseignants')}}" :label="ucwords(trans('elements.number_accounts_enseignants'))"/>
            <x-form.input type="number" min="0" required col="col-12 col-sm-6" name="{{config('tables.abonnements.columns.number_accounts_scolarite')}}" :label="ucwords(trans('elements.number_accounts_scolarite'))"/>
            <x-form.text-area  col="col-12 col-sm-12" name="{{config('tables.abonnements.columns.description')}}" :label="ucwords(trans('elements.description'))"/>

            <div class="col-12 mt-5">
                <x-form.button/>
            </div>
        </x-form.card>

    </x-form.form>
@endsection
