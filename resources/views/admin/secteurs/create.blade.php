@extends('layout.master')
@include('include.blade-components')
@section('page_title' , trans('pages/admin/secteurs.create_page_title'))
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="{{ trans('pages/admin/secteurs.edit_page_title') }}"
        :indexes="[
        ['name'=> trans('pages/admin/secteurs.index_page_title') , 'route'=> route('admin.secteurs.index')],
        ['name'=> trans('pages/admin/secteurs.create_page_title') ,     'current' =>true ],
    ]"
    />
@endsection
@section('content')
    <div class="row">
        <div class="col-12">

            <x-form.form
                method="post"
                action="{{ route('admin.secteurs.store') }}"
            >
                <x-form.card col="col-12 row" title="{{ ucwords(trans('pages/admin/secteurs.create_page_form_title')) }}">

                    <x-form.input required col="col-12 col-sm-6" :name="config('tables.secteurs.columns.name_fr')" :label="trans('elements.name_fr')"/>
                    <x-form.input required col="col-12 col-sm-6" :name="config('tables.secteurs.columns.name_ar')" :label="trans('elements.name_ar')"/>


                    <x-form.text-area :name="config('tables.secteurs.columns.description_fr')" :label="trans('elements.description_fr')"/>
                    <x-form.text-area :name="config('tables.secteurs.columns.description_ar')" :label="trans('elements.description_ar')"/>

                    <div class="col-12 mt-5">
                        <x-form.button/>
                    </div>
                </x-form.card>

            </x-form.form>

        </div>

    </div>


@endsection
