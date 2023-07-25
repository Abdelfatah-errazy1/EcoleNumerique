@extends('layout.master')
@include('include.blade-components')
@section('page_title' , trans('pages/salles.update_salle'))
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="{{ trans('pages/salles.update_salle') }}"
        :indexes="[
        ['name'=> trans('words.salle') , 'route'=> route('salles.index')],
        ['name'=> trans('pages/salles.update_salle') ,     'current' =>true ],
    ]"
    />
@endsection
@section('content')
    @bind($model)

    <x-form.form
        method="post"
        action="{{ route('salles.update' , $model[$model::PK]) }}"
    >
        <div class="col-12 row">
            <x-form.card col="col-12 row" title="{{ ucwords(trans('pages/edit_salle')) }}">

                <x-form.input name="codeS" col="col-4" required label="{{ trans('words.codeSalle') }}"/>

                <x-form.input name="titre" col="col-4" required label="{{ trans('words.titreSalle') }}"/>

                <x-form.input name="capacite" col="col-4" required type="number" label="{{ trans('words.capSalle') }}"/>

                <x-form.text-area name="description" col="col-12" label="{{ trans('words.descriptionSa') }}" />

                <x-form.select name="bloc" col="col-6" label="{{ trans('words.BTSalle') }}" required
                               :bind-with="[App\Models\Bloc::all(),['id','titre']]"
                />

                <x-form.select name="typeSalle" col="col-6" label="{{ trans('words.TTSalle') }}" required
                               :bind-with="[App\Models\TypeSalle::all(),['id','titre']]"
                />

                <div class="col-12 mt-5">
                    <x-form.button/>
                </div>
        </x-form.card>
        </div>
    </x-form.form>
    @endBinding
@endsection
