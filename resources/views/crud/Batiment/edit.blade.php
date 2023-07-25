@extends('layout.master')
@include('include.blade-components')
@section('page_title' , trans('pages/Batiments.updateBat'))
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="{{ trans('pages/Batiments.editBat') }}"
        :indexes="[
        ['name'=> trans('words.Batiments') , 'route'=> route('Batiments.index')],
        ['name'=> trans('pages/Batiments.updateBat') ,     'current' =>true ],
    ]"
    />
@endsection
@section('content')
    @bind($model)

    <x-form.form
        method="post"
        action="{{ route('Batiments.update' , $model[$model::PK]) }}"
    >
        <div class="col-12 row">
            <x-form.card col="col-12 row" title="{{ ucwords(trans('pages/Batiments.edit')) }}">
                <div class="col-10 row">
                    <x-form.input col='col-sm-6' name="codeBat" label="{{ trans('words.codeBat') }}"/>
                    <x-form.input col='col-sm-6' name="titre" label="{{ trans('words.titre') }}"/>
                    <x-form.text-area name="description" label="{{ trans('words.description') }}"/>
                    <x-form.select name="centreFormation" label="{{ trans('words.centreFormation') }}"
                    :bind-with="[
         \App\Models\centreFormation::all(),
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
