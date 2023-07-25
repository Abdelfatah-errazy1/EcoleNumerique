@extends('layout.master')
@include('include.blade-components')
@section('page_title', trans('words.add_a_new_bloc'))
@section('breadcrumb')
    <x-group.bread-crumb page-tittle="{{ trans('pages/blocs.create_page_title') }}" :indexes="[
        ['name' => trans('blocs'), 'route' => route('blocs.index')],
        ['name' => trans('pages/blocs.add_a_new_periode'), 'current' => true],
    ]" />
@endsection


@section('content')

    <x-form.form method="post" action="{{ route('blocs.store') }}">
        <x-form.card col="col-12 row" title="{{ ucwords(trans('pages/blocs.create_page_title')) }}">
            <div class="col-10 row">
                <x-form.input name="codeB" required col="col-6" label="{{ trans('words.codeBloc') }}" />
                <x-form.input name="titre" col="col-6" required label="{{ trans('words.titreBloc') }}" />

                <x-form.text-area name="description" label="{{ trans('words.description') }}" />

                <x-form.select name="batiment" required label="{{ trans('words.Batiment') }}" :bind-with="[\App\Models\Batiment::all(), ['id', 'titre']]" />

                <div class="col-12 mt-5">
                    <x-form.button />
                </div>
        </x-form.card>
    </x-form.form>
@endsection


@push('scripts')
    {{-- ? you can use javascript if you want for me I have notiong to do with it --}}
    <script src="{{ asset('assets/js/custom/crud/periode/create.js') }}"></script>
@endpush
