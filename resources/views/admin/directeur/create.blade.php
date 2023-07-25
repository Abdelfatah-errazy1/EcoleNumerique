@extends('layout.master')
@include('include.blade-components')
@section('page_title' , trans('app.add'))
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="{{trans('app.add') }}"
        :indexes="[
        ['name'=> trans('elements.liste_des_directeurs'), 'route'=> route('admin.directeur.index')],
        [
        'name'=> trans('app.add') ,
          'current' =>true
          ],
    ]"
    />
@endsection

@section('content')

    <x-form.form
        method="post"
        action="{{ route('admin.directeur.store') }}"
    >
        <x-form.card col="col-12 row" title="{{ ucwords(trans('app.add')) }}">

            <div class="col-12 col-md-2">
                <x-form.file :name="config('tables.directeure.columns.avatar')" label="{{ trans('elements.avatar') }}"/>
            </div>

            <div class=" col-12 col-md-10 row">
                <x-form.input required  name="{{config('tables.directeure.columns.cin')}}" col="col-md-4" label="{{ trans('elements.cin') }}"/>
                <x-form.input required name="{{config('tables.directeure.columns.last_name')}}" col="col-md-4" label="{{ trans('elements.last_name') }}"/>
                <x-form.input required name="{{config('tables.directeure.columns.first_name')}}" col="col-md-4" label="{{ trans('elements.first_name') }}"/>
                <x-form.radios   col="col-md-4" name="{{config('tables.directeure.columns.gender')}}" label="{{ trans('elements.gender') }}"
                                 :radios="[
                            [
                                'value' => 'H',
                                'label' => trans('elements.man'),
                            ],
                             [
                                'value' => 'F',
                                'label' => trans('elements.woman'),
                            ]
                        ]"
                />
                <x-form.select col="col-md-4" name="{{config('tables.directeure.columns.civility')}}" label="{{ trans('elements.civility') }}"
                               :options="[
                           'C' => trans('elements.celibataire'),
                           'M' =>  trans('elements.marie'),
                           'D' =>  trans('elements.divorce'),
                           'V' =>  trans('elements.veuf'),
                        ]"
                />
                <x-form.input-date  name="{{config('tables.directeure.columns.date_of_birth')}}" col="col-md-4" label="{{ trans('elements.date_of_birth') }}"/>
                <x-form.input   name="{{config('tables.directeure.columns.title_function')}}" col="col-md-6" label="{{ trans('elements.title_function') }}"/>
                <x-form.radios   col="col-md-6" name="{{config('tables.directeure.columns.type')}}" label="{{ trans('elements.type') }}"
                                 :radios="[
                            [
                                'value' => 'ETB',
                                'label' => 'directeur etablissement',
                            ],
                            [
                                'value' => 'ECF',
                                'label' => 'directeur centre formation',
                            ]
                        ]"
                />
                <x-form.text-area name="{{config('tables.directeure.columns.observation')}}" col="col-12" label="{{ trans('elements.observation') }}"/>
                <x-form.input  name="{{config('tables.directeure.columns.phone')}}" col="col-md-4" label="{{ trans('elements.phone') }}"/>
                <x-form.input name="{{config('tables.directeure.columns.gsm')}}" col="col-md-4" label="{{ trans('elements.gsm') }}"/>
                <x-form.input name="{{config('tables.directeure.columns.fax')}}" col="col-md-4" label="{{ trans('elements.fax') }}"/>
                <x-form.text-area name="{{config('tables.directeure.columns.address')}}" col="col-12" label="{{ trans('elements.address') }}"/>
                <x-form.input name="{{config('tables.directeure.columns.postal_code')}}" col="col-md-6" label="{{ trans('elements.postal_code') }}"/>
                <x-form.input name="{{config('tables.directeure.columns.city')}}" col="col-md-6" label="{{ trans('elements.city') }}"/>
                <x-form.input name="{{config('tables.directeure.columns.country')}}" col="col-md-6" label="{{ trans('elements.country') }}" />
                <x-form.input type='email'  name="{{config('tables.directeure.columns.email')}}" col="col-md-6" label="{{ trans('elements.email') }}"/>
                <x-form.input name="{{config('tables.directeure.columns.web_site')}}" col="col-md-6" label="{{ trans('elements.web_site') }}"/>
                <x-form.input name="{{config('tables.directeure.columns.nationality')}}" col="col-md-6" label="nationality" />

            </div>


            <div class="col-sm-12 mt-5">
                <x-form.button />
            </div>
        </x-form.card>

    </x-form.form>
    {{-- <div id="asa" data-data="{{ json_encode( $data) }}"></div> --}}

    @endsection
    @push('scripts')

        {{-- <script src="{{ asset('assets/js/custom/crud/countries.js') }}"></script> --}}
        <script src="{{ asset('assets/js/custom/crud/createCountries.js') }}"></script>

    @endpush
