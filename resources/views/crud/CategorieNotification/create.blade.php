@extends('layout.master')
@include('include.blade-components')
@section('page_title' , trans('pages/CategoriesNotifications.addCatNot'))
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="{{ trans('pages/CategoriesNotifications.createCatNot') }}"
        :indexes="[
        ['name'=> trans('words.categoriesNotifications') , 'route'=> route('CategoriesNotifications.index')],
        ['name'=> trans('pages/CategoriesNotifications.addCatNot') ,     'current' =>true ],
    ]"
    />
@endsection


@section('content')

    <x-form.form
        method="post"
        action="{{ route('CategoriesNotifications.store') }}"
    >
        <x-form.card col="col-12 row" title="{{ ucwords(trans('pages/CategoriesNotifications.edit_form_title')) }}">


            <div class="col-10 row">
                <x-form.input name="titre" label="{{ trans('words.titre') }}"/>
                <x-form.input name="description" label="{{ trans('words.description') }}"/>
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



