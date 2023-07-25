@extends('layout.master')
@include('include.blade-components')
@section('page_title', ucwords(trans('app.edit')))
@section('breadcrumb')
    <x-group.bread-crumb page-tittle="{{ trans('app.edit') }}" :indexes="[
        ['name' => trans('elements.liste_des_centres_de_Formations'), 'route' => route('admin.centresFormations.index')],
        ['name' => trans('app.edit'), 'current' => true],
    ]" />
@endsection
@section('content')
    @bind($model)
        <x-form.form method="post" action="{{ route('admin.centresFormations.update', $model[$model::PK]) }}">
            <x-form.card col="col-12 row" title="{{ ucwords(trans('app.edit')) }}">

                <div class="col-2">
                    <x-form.file required :name="config('tables.centreformations.columns.logo')" :label="trans('app.logo')" />
                </div>
                <div class="col-10 row">
                    <x-form.input col="col-sm-4" required :name="config('tables.centreformations.columns.name_FR')" :label="trans('elements.name_fr')" />
                    <x-form.input col="col-sm-4" :name="config('tables.centreformations.columns.name_AR')" :label="trans('elements.name_ar')" />
                    <x-form.select col="col-sm-4" required :name="config('tables.centreformations.columns.etablissement_FK')" :label="trans('elements.etablissement')"
                                   :bind-with="$etablissements" />
                    <x-form.text-area col="col-sm-12" :name="config('tables.centreformations.columns.address')" :label="trans('elements.address')" />
                    <x-form.input col="col-sm-3" :name="config('tables.centreformations.columns.postal_code')" :label="trans('elements.postal_code')" />
                    <x-form.input col="col-sm-3" required :name="config('tables.centreformations.columns.country')" :label="trans('elements.country')"/>
                    <x-form.input col="col-sm-3" :name="config('tables.centreformations.columns.city')" :label="trans('elements.city')" />
                    <x-form.input type='email' col="col-sm-3" :name="config('tables.centreformations.columns.email')" :label="trans('elements.email')" />
                    <x-form.input col="col-sm-3" :name="config('tables.centreformations.columns.web_site')" :label="trans('elements.web_site')" />
                    <x-form.input col="col-sm-3" :name="config('tables.centreformations.columns.phone')" :label="trans('elements.phone')" />
                    <x-form.input col="col-sm-3" :name="config('tables.centreformations.columns.whatsapp')" label="whatsapp" />
                    <x-form.text-area col="col-sm-6" :name="config('tables.centreformations.columns.description_FR')" :label="trans('elements.description_fr')" />
                    <x-form.text-area col="col-sm-6" :name="config('tables.centreformations.columns.description_AR')" :label="trans('elements.description_ar')" />

                    <div class="col-sm-12 mt-5">
                        <x-form.button />
                    </div>
                </div>
            </x-form.card>
        </x-form.form>
    @endBinding
    <div id="data-countries" data-ville='{{ $model->ville }}' data-countrie='{{ $model->pays }}'></div>
    @endsection
    @push('scripts')
        <script src="{{ asset('assets/js/custom/crud/countries.js') }}"></script>
        <script src="{{ asset('assets/js/custom/crud/EditCountries.js') }}"></script>
    @endpush
