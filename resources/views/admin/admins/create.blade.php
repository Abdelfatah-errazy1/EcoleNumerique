@extends('layout.master')
@include('include.blade-components')
@section('page_title' ,trans('pages/admin/admins.create_page_title'))
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="{{trans('pages/admin/admins.create_page_title')}}"
        :indexes="[
        ['name'=> ucwords(trans('pages/admin/admins.index_page_title')) , 'route'=> route('admin.admins.index')],
        ['name'=> ucwords(trans('pages/admin/admins.create_page_title')) , 'current' => true ],
    ]"
    />
@endsection
@section('content')


    <x-form.form
        method="post"
        action="{{ route('admin.admins.store') }}"
    >

        <x-form.card col="col-12 row" title="{{__('pages/admin/admins.create_page_form_title')}}">

            <div class="col-3">
                <x-form.file name="{{ config('tables.admins.columns.photo') }}"
                             :label="trans('pages/admin/admins.photo')"/>
            </div>
            <div class="col-9 row">
                <x-form.input col="col-12 col-sm-3" :name="config('tables.admins.columns.first_name')"
                              :label="trans('pages/admin/admins.first_name')"/>
                <x-form.input col="col-12 col-sm-3" :name="config('tables.admins.columns.last_name')"
                              :label="trans('pages/admin/admins.last_name')"/>
                <x-form.input-date col="col-12 col-sm-3" :name="config('tables.admins.columns.birthday')"
                                   :label="trans('pages/admin/admins.birthday')" identifer="fdsf"/>
                <x-form.select col="col-12 col-sm-3" :name="config('tables.admins.columns.gender')"
                               :label="trans('elements.gender')"
                               :options="\App\Enums\AdminGender::toArray()"/>
                <x-form.input col="col-12 col-sm-6" :name="config('tables.admins.columns.phone_number')"
                              :label="trans('elements.phone')"/>
                <x-form.input col="col-12 col-sm-6" :name="config('tables.admins.columns.email')"
                              :label="trans('elements.email')"/>
                <x-form.text-area :name="config('tables.admins.columns.description')"
                                  :label="trans('elements.description')"/>
            </div>



            <div class="col-12 mt-5">
                <x-form.button/>
            </div>
        </x-form.card>
    </x-form.form>


@endsection
