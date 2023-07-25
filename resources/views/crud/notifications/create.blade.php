@extends('layout.master')
@include('include.blade-components')
@section('page_title' , trans('pages/notifications.add_a_new_notification'))
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="{{ trans('pages/notifications.create_page_title') }}"
        :indexes="[
        ['name'=> trans('words.notification') , 'route'=> route('notifications.index')],
        ['name'=> trans('pages/notifications.add_a_new_notification') ,     'current' =>true ],
    ]"
    />
@endsection


@section('content')

    <x-form.form
        method="post"
        action="{{ route('notifications.store') }}"
    >
        <x-form.card col="col-12 row" title="{{ ucwords(trans('pages/notifications.edit_form_title')) }}">

           
       
                <x-form.select col='col-12  col-sm-6 ' name="CategorieNotif" label="{{ trans('words.categorie') }}"
                            :bind-with="[
                    \App\Models\CategorieNotification::all(),
                    [
                        'idCN' ,  'titre'
                    ]
                ]"
                />
                <x-form.input-date col='col-12 col-sm-6' name="dateCreation" label="{{ trans('words.date') }}"/>
                <x-form.input col='col-12 ' name="objet" label="{{ trans('words.objet') }}"/>
                <x-form.text-area  name="description" label="{{ trans('words.description') }}"/>

                
               


                <div class="col-12 mt-5">
                    <x-form.button/>
                </div>
        </x-form.card>

    </x-form.form>
@endsection


@push('scripts')
    <script src="{{ asset('assets/js/custom/crud/notifications/create.js') }}"></script>
@endpush
