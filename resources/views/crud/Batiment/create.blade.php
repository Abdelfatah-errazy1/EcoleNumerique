@extends('layout.master')
@include('include.blade-components')
@section('page_title' , trans('pages/Batiments.addBat'))
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="{{ trans('pages/Batiments.createBat') }}"
        :indexes="[
        ['name'=> trans('words.Batiments') , 'route'=> route('Batiments.index')],
        ['name'=> trans('pages/Batiments.addBat') ,     'current' =>true ],
    ]"
    />
@endsection


@section('content')

    <x-form.form
        method="post"
        action="{{ route('Batiments.store') }}"
    >
        <x-form.card col="col-12 row" title="{{ ucwords(trans('pages/Batiments.edit_form_title')) }}">


            <div class="col-10 row">
                <x-form.input col='col-sm-6' name="codeBat" label="{{ trans('words.codeBat') }}"/>
                <x-form.input col='col-sm-6' name="titre" label="{{ trans('words.titre') }}"/>
                <x-form.text-area name="description" label="{{ trans('words.description') }}"/>
                <x-form.select name="centreFormation" label="{{ trans('words.centreFormation') }}"
                :bind-with="[
     \App\Models\CentreFormation::all(),
     [
         'id' ,  'name_FR'
     ]
 ]"
 />
                <div class="col-12 mt-5">
                    <x-form.button/>
                </div>
        </x-form.card>

    </x-form.form>
@endsection



