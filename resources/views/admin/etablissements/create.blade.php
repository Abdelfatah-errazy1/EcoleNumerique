@extends('layout.master')
@include('include.blade-components')
@section('page_title', ucwords(trans('app.add')))
@section('breadcrumb')
    <x-group.bread-crumb page-tittle="{{ trans('app.add') }}" :indexes="[
        ['name' => trans('elements.liste_des_etablissements'), 'route' => route('admin.etablissements.index')],
        ['name' => trans('app.add'), 'current' => true],
    ]" />
@endsection
@section('content')
    <x-form.form method="post" action="{{ route('admin.etablissements.store') }}">
        <x-form.card col="col-12 row" title="{{ ucwords(trans('app.add')) }}">

            <div class="col-2">
                <x-form.file required :name="config('tables.etablissements.columns.logo')" label="{{ trans('app.logo') }}" />
            </div>
            <div class="col-10 row">

                <x-form.input col="col-4" required :name="config('tables.etablissements.columns.name_FR')" label="{{ trans('elements.name_fr') }}" />
                <x-form.input col="col-4" :name="config('tables.etablissements.columns.name_AR')" label="{{ trans('elements.name_ar') }}" />
                <x-form.select col="col-4" required :name="config('tables.etablissements.columns.directeur_FK')" :label="trans('elements.directeur')" :bind-with="$directeure" />
                <x-form.text-area col="col-12" :name="config('tables.etablissements.columns.address')" label="{{ trans('elements.address') }}" />
                <x-form.input col="col-3" :name="config('tables.etablissements.columns.city')" label="{{ trans('elements.city') }}" />
                <x-form.input col="col-3" :name="config('tables.etablissements.columns.postal_code')" label="{{ trans('elements.postal_code') }}" />
                <x-form.input col="col-3" required :name="config('tables.etablissements.columns.country')" label="{{ trans('elements.country') }}"/>
                <x-form.input col="col-3" :name="config('tables.etablissements.columns.email')" label="{{ trans('elements.email') }}" />
                <x-form.input col="col-3" :name="config('tables.etablissements.columns.web_site')" label="{{ trans('elements.web_site') }}" />
                <x-form.input col="col-3" :name="config('tables.etablissements.columns.phone')" label="{{ trans('elements.phone') }}" />
                <x-form.input col="col-3" :name="config('tables.etablissements.columns.whatsapp')" label="Whatsapp" />
                <x-form.text-area col="col-6" :name="config('tables.etablissements.columns.description_FR')" label="{{  trans('elements.description_fr') }}" />
                <x-form.text-area col="col-6" :name="config('tables.etablissements.columns.description_AR')" label="{{ trans('elements.description_ar') }}" />


            </div>
            <div class="col-12 mt-5">
                <x-form.button />
            </div>
        </x-form.card>
    </x-form.form>
    @endsection
    @push('scripts')
        <script src="{{ asset('assets/js/custom/crud/countries.js') }}"></script>
        <script src="{{ asset('assets/js/custom/crud/createCountries.js') }}"></script>
    @endpush
