@extends('layout.master')
@include('include.blade-components')
@section('page_title' , trans('pages/chapitres.add_a_new_chapitre'))
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="{{ trans('pages/chapitres.create_page_title') }}"
        :indexes="[
        ['name'=> trans('chapitre') , 'route'=> route('chapitres.index')],
        ['name'=> trans('ajouter Chapitre') ,     'current' =>true ],
    ]"
    />
@endsection


@section('content')

    <x-form.form
        method="post"
        action="{{ route('chapitres.store') }}"
    >



        <x-form.card col="col-12 row" title="{{ ucwords(trans('Les Informations De Chapitre')) }}">

            
            <x-form.input col=' col-sm-4' name="numChap" required label="{{ trans('words.numchap') }}"/>
    
            <x-form.select col='col-sm-8' name="matiere" required label="{{ trans('words.matiere') }}"
                            :bind-with="[
                        \App\Models\Matiere::all(),
                        [
                            'idMat' ,  'codeMa'
                        ]
                    ]"
            />
            <x-form.input col=' col-sm-6' name="nomFr" required label="{{ trans('words.nomFr') }}" />
            <x-form.input col=' col-sm-6' name="nomAr" required label="{{ trans('words.nomAr') }}" />
            <x-form.input col=' col-sm-6' type='number' name="dureeH" label="{{ trans('words.duree') . ' (heur)'}}" />
            <x-form.input col=' col-sm-6' type='number' name="dureeM" label="{{ trans('words.duree') . ' (minut)'}}" />
            <x-form.text-area name="descriptionFr" required label="{{ trans('words.descriptionFr') }}" />
            <x-form.text-area name="descriptionAr" label="{{ trans('words.descriptionAr') }}" />
            

            <div class="col-12 mt-5">
                <x-form.button/>
            </div>






        </x-form.card>

    </x-form.form>
@endsection
