@extends('layout.master')
@include('include.blade-components')
@section('page_title' , trans('pages/modules.update_module'))
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="{{ trans('pages/modules.edit_page_title') }}"
        :indexes="[
        ['name'=> trans('words.user') , 'route'=> route('modules.index')],
        ['name'=> trans('pages/modules.update_module') ,     'current' =>true ],
    ]"
    />
@endsection
@section('content')
    @bind($model)

    <x-form.form
        method="post"
        action="{{ route('modules.update' , $model[$model::PK]) }}"
    >
        <div class="col-12 row">
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
                <x-form.input type='number'  col='col-12 col-sm-4' name="minute" label="{{ trans('words.minute') }}"/>
                <x-form.input type='number' col='col-12 col-sm-4' name="coef" label="{{ trans('words.coef') }}"/>
                <x-form.text-area  name="descriptionFr" label="{{ trans('words.descriptionFr') }}"/>
                <x-form.text-area  name="descriptionAr" label="{{ trans('words.descriptionAr') }}"/>

                
               
                    <div class="col-12 mt-5">
                        <x-form.button/>
                    </div>
            </x-form.card>
            <div class="col-12">
                {{-- @dd($model->matieres() ) --}}
{{-- 
                <x-form.card col="col-12 row " title="{{ ucwords(trans('pages/modules.liste_des_matieres')) }}">
                    @bind( $model->matieres() )
                    <x-table.data-table
                        :actions="$actions"
                        :heads="$heads"
                        edit-route="matieres.show"
                        delete-route="matieres.delete"
                    />
                    @endBinding
                </x-form.card> --}}
            </div>
        </div>
    </x-form.form>

    @endBinding
    
    <x-form.card col="col-12 row pt-5" title="Historique">
        <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x mb-5 fs-6">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#kt_prerequis_tab">Prerequis</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " data-bs-toggle="tab" href="#kt_objectifs_tab">Objectifs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " data-bs-toggle="tab" href="#kt_support_tab">Suppors de Module</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " data-bs-toggle="tab" href="#kt_matieres_tab">Liste de Matieres</a>
            </li>

        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="kt_prerequis_tab" role="tabpanel">


                    {{-- @bind( $model->stades )
                    <x-table.data-table
                        :actions="$actions"
                        :heads="$heads"
                        edit-route="stades.show"
                        delete-route="stades.delete"

                    />
                    @endBinding --}}


            </div>

            <div class="tab-pane fade show " id="kt_objectifs_tab" role="tabpanel">

                {{-- @bind( $model2->varietes )
                <x-table.data-table
                    :actions="$actions2"
                    :heads="$heads2"
                    edit-route="varietes.show"
                    delete-route="varietes.delete"
                />
                @endBinding --}}

            </div>
            <div class="tab-pane fade show " id="kt_support_tab" role="tabpanel">

                {{-- @bind( $model2->varietes )
                <x-table.data-table
                    :actions="$actions2"
                    :heads="$heads2"
                    edit-route="varietes.show"
                    delete-route="varietes.delete"
                />
                @endBinding --}}

            </div>
            <div class="tab-pane fade show " id="kt_matieres_tab" role="tabpanel">

                {{-- @bind( $model2->varietes )
                <x-table.data-table
                    :actions="$actions2"
                    :heads="$heads2"
                    edit-route="varietes.show"
                    delete-route="varietes.delete"
                />
                @endBinding --}}

            </div>
        </div>
    </x-form.card>
@endsection
