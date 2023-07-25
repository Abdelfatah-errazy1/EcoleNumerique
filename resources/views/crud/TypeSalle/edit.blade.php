@extends('layout.master')
@include('include.blade-components')
@section('page_title' , trans('pages/TypesSalles.updateTS'))
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="{{ trans('pages/TypesSalles.editTS') }}"
        :indexes="[
        ['name'=> trans('words.TypesSalles') , 'route'=> route('TypesSalles.index')],
        ['name'=> trans('pages/TypesSalles.updateTS') ,     'current' =>true ],
    ]"
    />
@endsection
@section('content')
    @bind($model)

    <x-form.form
        method="post"
        action="{{ route('TypesSalles.update' , $model[$model::PK]) }}"
    >
        <div class="col-12 row">
            <x-form.card col="col-12 row" title="{{ ucwords(trans('pages/TypesSalles.edit')) }}">
                <div class="col-10 row">
                    <x-form.input name="codeTS" col="col-6" label="{{ trans('words.codeTS') }}"/>
                <x-form.input name="titre" col="col-6"  label="{{ trans('words.titre') }}"/>
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
