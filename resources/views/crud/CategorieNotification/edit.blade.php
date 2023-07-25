@extends('layout.master')
@include('include.blade-components')
@section('page_title' , trans('pages/CategoriesNotifications.updateCatNot'))
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="{{ trans('pages/CategoriesNotifications.editCatNot') }}"
        :indexes="[
        ['name'=> trans('words.categoriesNotifiactions') , 'route'=> route('CategoriesNotifications.index')],
        ['name'=> trans('pages/CategoriesNotifications.updateCatNot') ,     'current' =>true ],
    ]"
    />
@endsection
@section('content')
    @bind($model)

    <x-form.form
        method="post"
        action="{{ route('CategoriesNotifications.update' , $model[$model::PK]) }}"
    >
        <div class="col-12 row">
            <x-form.card col="col-12 row" title="{{ ucwords(trans('pages/CategoriesNotifiactions.edit')) }}">
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
        </div>
    </x-form.form>
    @endBinding
@endsection
