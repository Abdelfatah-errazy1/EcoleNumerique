@extends('layout.master')
@include('include.blade-components')
@section('page_title' , trans('pages/modules.add_a_new_module'))
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="{{ trans('pages/modules.create_page_title') }}"
        :indexes="[
        ['name'=> trans('words.module') , 'route'=> route('modules.index')],
        ['name'=> trans('pages/modules.add_a_new_module') ,     'current' =>true ],
    ]"
    />
@endsection


@section('content')

    <x-form.form
        method="post"
        action="{{ route('modules.store') }}"
    >
        <x-form.card col="col-12 row" title="{{ ucwords(trans('pages/modules.edit_form_title')) }}">

           
       
                <x-form.input col='col-12 col-sm-4' name="codeMod" label="{{ trans('words.code') }}"/>
                <x-form.select col='col-12 col-sm-8' name="filliereNiveau" label="{{ trans('words.filliere') }}"
                               :bind-with="[
                    \App\Models\Filiere::all(),
                    [
                        'id' ,  'name_fr'
                    ]
                ]"
                />
                <x-form.input col='col-12 col-sm-6' name="nomFr" label="{{ trans('words.nomFr') }}"/>
                <x-form.input col='col-12 col-sm-6' name="nomAr" label="{{ trans('words.nomAr') }}"/>
                <x-form.input type='number' col='col-12 col-sm-4' name="heure" label="{{ trans('words.heure') }}"/>
                <x-form.input type='number'  col='col-12 col-sm-4' name="minute" label="{{ trans('words.minute') }}"/>                <x-form.input type='number' col='col-12 col-sm-4' name="coef" label="{{ trans('words.coef') }}"/>
                <x-form.text-area  name="descriptionFr" label="{{ trans('words.descriptionFr') }}"/>
                <x-form.text-area  name="descriptionAr" label="{{ trans('words.descriptionAr') }}"/>

                
               


                <div class="col-12 mt-5">
                    <x-form.button/>
                </div>
        </x-form.card>

    </x-form.form>
@endsection


@push('scripts')
    <script src="{{ asset('assets/js/custom/crud/modules/create.js') }}"></script>
@endpush
