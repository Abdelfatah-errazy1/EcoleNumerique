@extends('layout.master')
@include('include.blade-components')
@section('page_title' , trans('pages/users.update_user'))
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="{{ trans('modifier chapitre') }}"
        :indexes="[
        ['name'=> trans('list des chapitre') , 'route'=> route('users.index')],
        ['name'=> trans('modifier chpitre') ,     'current' =>true ],
    ]"
    />
@endsection
@section('content')
    @bind($model)
    <x-form.form
        method="post"
        action="{{ route('chapitres.update' , $model[\App\Models\Chapitre::PK]) }}">
        <div class="col-12 row">
            <x-form.card col="col-12 row" title="{{ ucwords(trans('Les Informations De Chapitre')) }}">

                <x-form.input col=' col-sm-4' name="numChap" required label="{{ trans('words.numchap') }}"/>
    
            <x-form.select col='col-sm-8' name="matiere" required label="{{ trans('words.matiere') }}"
                            :bind-with="[
                        \App\Models\Matiere::all(),
                        [
                            'idMat' ,  'nomFr'
                        ]
                    ]"
            />
            <x-form.input col=' col-sm-6' name="nomFr" required label="{{ trans('words.nomFr') }}" />
            <x-form.input col=' col-sm-6' name="nomAr" required label="{{ trans('words.nomAr') }}" />
            <x-form.input col=' col-sm-6' type='number' name="dureeH" label="{{ trans('words.heur') }}" />
            <x-form.input col=' col-sm-6' type='number' name="dureeM" label="{{ trans('words.min') }}" />
            <x-form.text-area name="descriptionFr" required label="{{ trans('words.descriptionFr') }}" />
            <x-form.text-area name="descriptionAr" label="{{ trans('words.descriptionAr') }}" />
            


                <div class="col-12 mt-5">
                    <x-form.button/>
                </div>
            </x-form.card>
        </div>

    </x-form.form>
    @endBinding
    <div class="col-12">
        {{-- @dd($model->matieres() ) --}}
        
        <x-form.card col="col-12 row " title="{{ ucwords(trans('pages/detailsChapitres.edit_form_title')) }}">
            @bind( $model->detailChapitres() )
            <x-table.data-table
            :actions="$actions"
            :heads="$heads"
            edit-route="detailsChapitres.show"
            delete-route="detailsChapitres.delete"
            />
            @endBinding
        </x-form.card>
    </div>
@endsection
