@extends('layout.master')
@include('include.blade-components')
@section('page_title' , trans('pages/detailsChapitres.update_detailsChapitre'))
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="{{ trans('pages/detailsChapitres.edit_page_title') }}"
        :indexes="[
        ['name'=> trans('words.user') , 'route'=> route('detailsChapitres.index')],
        ['name'=> trans('pages/detailsChapitres.update_detailsChapitre') ,     'current' =>true ],
    ]"
    />
@endsection
@section('content')
    @bind($model)

    <x-form.form
        method="post"
        action="{{ route('detailsChapitres.update' , $model[$model::PK]) }}"
    >
    {{-- @dd($model) --}}
        <div class="col-12 row">
            <x-form.card col="col-12 row" title="{{ ucwords(trans('pages/detailsChapitres.edit_form_title')) }}">

                <x-form.input col='col-12 col-sm-4' name="code" label="{{ trans('words.code') }}"/>
                <x-form.select col='col-12 col-sm-8' name="chapitre" label="{{ trans('words.chapitre') }}"
                               :bind-with="[
                    \App\Models\Chapitre::all(),
                    [
                        'idCh' ,  'nomFr'
                    ]
                ]"
                />
                <x-form.input col='col-12 col-sm-6' name="titreFr" label="{{ trans('words.titreFr') }}"/>
                <x-form.input col='col-12 col-sm-6' name="titreAr" label="{{ trans('words.titreAr') }}"/>          
                <x-form.text-area  name="descriptionFr" label="{{ trans('words.descriptionFr') }}"/>
                <x-form.text-area  name="descriptionAr" label="{{ trans('words.descriptionAr') }}"/>

                    <div class="col-12 mt-5">
                        <x-form.button/>
                    </div>
            </x-form.card>
           
        </div>
    </x-form.form>
    @endBinding
@endsection
