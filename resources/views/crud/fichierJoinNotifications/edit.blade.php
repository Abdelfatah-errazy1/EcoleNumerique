@extends('layout.master')
@include('include.blade-components')
@section('page_title' , trans('pages/notifications.update_notification'))
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="{{ trans('pages/notifications.edit_page_title') }}"
        :indexes="[
        ['name'=> trans('words.notification') , 'route'=> route('notifications.index')],
        ['name'=> trans('pages/notifications.update_notification') ,     'current' =>true ],
    ]"
    />
@endsection
@section('content')
    @bind($model)

    <x-form.form
        method="post"
        action="{{ route('fichierJoinNotifications.update',$model[$model::PK]) }}"
    >
        <x-form.card col="col-12 row" title="{{ ucwords(trans('pages/fichierJoinNotifications.edit_form_title')) }}">

           
       
            
                <x-form.input col='col-12 col-sm-6' name="titre" label="{{ trans('words.titre') }}"/>
                {{-- <x-form.input-file col='col-12 col-sm-6' name="fichierJNotification" label="{{ trans('words.titre') }}"/> --}}
                <x-form.text-area  name="description" label="{{ trans('words.description') }}"/>

                
                <div class="col-12">
                    <div class="d-flex flex-column">
                        <div class="mb-3">
                            <label for="formFileMultiple"  class="form-label">{{ trans('words.fichierJNotification') }}</label>
                            <input class="form-control" type="file" name="fichierJNotification"  id="formFileMultiple" multiple>
                          </div>
                
                    </div>                
                </div>
                
                


                <div class="col-12 mt-5">
                    <x-form.button/>
                </div>
        </x-form.card>

    </x-form.form>
    @endBinding
@endsection
