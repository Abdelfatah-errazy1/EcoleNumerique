@extends('layout.master')
@include('include.blade-components')
@section('page_title' , trans('pages/fichierJoinNotifications.add_a_new_fichier'))
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="{{ trans('pages/fichierJoinNotifications.create_page_title') }}"
        :indexes="[
        ['name'=> trans('words.fichierJoin') , 'route'=> route('fichierJoinNotifications.index')],
        ['name'=> trans('pages/fichierJoinNotifications.add_a_new_fichier') ,     'current' =>true ],
    ]"
    />
@endsection


@section('content')

    <x-form.form
        method="post"
        action="{{ route('fichierJoinNotifications.store',$id) }}"
    >
        <x-form.card col="col-12 row" title="{{ ucwords(trans('pages/fichierJoinNotifications.edit_form_title')) }}">

           
       
            
                <x-form.input  name="titre" label="{{ trans('words.titre') }}"/>
                <x-form.text-area  name="description" label="{{ trans('words.description') }}"/>

                
                <div class="col-12 ">
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
  
@endsection


