@extends('layout.master')
@include('include.blade-components')
@section('page_title', trans('pages/periodes.update_periode'))
@section('breadcrumb')
    <x-group.bread-crumb page-tittle="{{ trans('pages/periodes.edit_page_title') }}" :indexes="[
        ['name' => trans('words.periode'), 'route' => route('periodes.index')],
        ['name' => trans('pages/periodes.update_periode'), 'current' => true],
    ]" />
@endsection
@section('content')
    @bind($model)
        <x-form.form method="post" action="{{ route('periodes.update', $model[$model::PK]) }}">
            <div class="col-12 row">
                <x-form.card col="col-12 row" title="{{ ucwords(trans('pages/Edit_form_title')) }}">
                    <div class="col-10 row">
                        <x-form.input name="codeP" col="col-6" label="{{ trans('code Periode') }}" />
                        <x-form.select name="filliereNiveau" col="col-6" label="{{ trans('Filliere Niveau') }}"
                            :bind-with="[\App\Models\Filiere::all(), ['id', 'name_fr']]" />

                        <x-form.input name="nomP" col="col-4" label="{{ trans('words.name') }}" />
                        <x-form.input-date name="dateDebut" col="col-4" label="{{ trans('words.date') }}"
                            :picker-type="\App\View\Components\Form\InputDate::DATE" />
                        <x-form.input-date name="dateFin" col="col-4" label="{{ trans('words.date') }}" :picker-type="\App\View\Components\Form\InputDate::DATE" />

                        <x-form.text-area name="description" label="{{ trans('description') }}" />

                        <div class="col-12 mt-5">
                            <x-form.button />
                        </div>
                </x-form.card>
            </div>
        </x-form.form>
    @endBinding
@endsection
