@extends('layout.master')
@include('include.blade-components')
@section('page_title' , trans('pages/matieres.update_matiere'))
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="{{ trans('pages/matieres.edit_page_title') }}"
        :indexes="[
        ['name'=> trans('words.matiere') , 'route'=> route('matieres.index')],
        ['name'=> trans('pages/matieres.update_matiere') ,     'current' =>true ],
    ]"
    />
@endsection
@section('content')
    @bind($model)

    <x-form.form
        method="post"
        action="{{ route('matieres.update' , $model[$model::PK]) }}"
    >
        <div class="col-12 row">
            <x-form.card col="col-12 row" title="{{ ucwords(trans('pages/matieres.edit_form_title')) }}">

                
                <x-form.input col='col-12 col-sm-4' name="codeMa" label="{{ trans('words.code') }}"/>
                <x-form.select col='col-12 col-sm-8' name="module" label="{{ trans('words.module') }}"
                               :bind-with="[
                    \App\Models\Module::all(),
                    [
                        'idM' ,  'nomFr'
                    ]
                ]"
                />
                <x-form.input col='col-12 col-sm-6' name="nomFr" label="{{ trans('words.nomFr') }}"/>
                <x-form.input col='col-12 col-sm-6' name="nomAr" label="{{ trans('words.nomAr') }}"/>
                <x-form.input type='number' col='col-12 col-sm-2' name="heure" label="{{ trans('words.heure') }}"/>                
                <x-form.input type='number'  col='col-12 col-sm-2' name="minute" label="{{ trans('words.min') }}"/> 
                <x-form.input type='number' col='col-12 col-sm-2' name="coef" label="{{ trans('words.coef') }}"/>

                <x-form.select col='col-12 col-sm-6' name="periode" label="{{ trans('words.periode') }}"
                               :bind-with="[
                    \App\Models\Periode::all(),
                    [
                        'idP' ,  'nomP'
                    ]
                ]"/>
                <x-form.text-area  name="descriptionFr" label="{{ trans('words.descriptionFr') }}"/>
                <x-form.text-area  name="descriptionAr" label="{{ trans('words.descriptionAr') }}"/>

                
               
                    <div class="col-12 mt-5">
                        <x-form.button/>
                    </div>
            </x-form.card>
        
        </div>
    </x-form.form>
    @endBinding
    <div class="col-12">
        {{-- @dd($model->matieres() ) --}}
        
        <x-form.card col="col-12 row " title="{{ ucwords(trans('pages/matieres.liste_des_chapitres')) }}">
            @bind( $model->chapitres() )
            <x-table.data-table
            :actions="$actions"
            :heads="$heads"
            edit-route="chapitres.show"
            delete-route="chapitres.delete"
            />
            @endBinding
        </x-form.card>
    </div>
@endsection
            