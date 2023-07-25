@extends('layout.master')
@include('include.blade-components')
@section('page_title', trans('pages/blocs.update_bloc'))
@section('breadcrumb')
    <x-group.bread-crumb page-tittle="{{ trans('pages/blocs.edit_page_title') }}" :indexes="[
        ['name' => trans('words.blocs'), 'route' => route('blocs.index')],
        ['name' => trans('pages/blocs.update_bloc'), 'current' => true],
    ]" />
@endsection
@section('content')
    @bind($model)
        <x-form.form method="post" action="{{ route('blocs.update', $model[$model::PK]) }}">
            <div class="col-12 row">
                <x-form.card col="col-12 row" title="{{ ucwords(trans('pages/blocs.edit_form_title')) }}">
                    <div class="col-10 row">
                        <x-form.input name="codeB" col="col-6" label="{{ trans('words.codeBloc') }}" />
                        <x-form.input name="titre" col="col-6" label="{{ trans('words.titreBloc') }}" />

                        <x-form.text-area name="description" label="{{ trans('words.description') }}" />

                        <x-form.select name="Batiment" label="{{ trans('words.Batiment') }}" :bind-with="[\App\Models\Batiment::all(), ['id', 'titre']]" />

                        <div class="col-12 mt-5">
                            <x-form.button />
                        </div>
                </x-form.card>
            </div>
        </x-form.form>
    @endBinding
@endsection
