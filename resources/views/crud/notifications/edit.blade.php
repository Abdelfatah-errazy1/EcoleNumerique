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
        action="{{ route('notifications.update' , $model[$model::PK]) }}"
    >
        <div class="col-12 row">
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

                <div class="d-flex justify-content-between">
                    <div class=" mt-5">
                        <div class="mt-2">
                            <button type="submit"  class="app-button  btn btn-primary">
                                <span class="indicator-label">update</span>
                                <span class="indicator-progress">Please wait...
                                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                    </div>
                    <div class=" mt-5">
                        <div class="mt-2">
                            <a href="{{ route('fichierJoinNotifications.create',$id) }}" name="" class="app-button  btn btn-success">
                                <span class="indicator-label">Ajouter Fichier Join</span>
                                <span class="indicator-progress">Please wait...
                                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </a>
                        </div>
                    </div>
                </div>



            </x-form.card>
        </div>
    </x-form.form>
    @endBinding
    <div class="col-xl-12">
        <!--begin::Tables Widget 9-->
        <div class="card card-xl-stretch mb-5 mb-xl-8">

            <div class="card-body py-3">
                <!--begin::Table container-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="table">
                        <!--begin::Table head-->
                        <thead>
                        <tr class="fw-bolder text-muted">

                            <th class="min-w-90px"> {{ trans('words.titre') }} </th>
                            <th class="min-w-60px"> {{ trans('words.description') }}</th>

                            <th class="min-w-100px text-end"> {{ trans('words.actions') }} </th>
                        </tr>
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->


                        <tbody>
                            @isset($fichiers)
                            @foreach ($fichiers as $fichier)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex justify-content-start flex-column">
                                                <span class="text-dark fw-bolder text-hover-primary fs-6">{{ $fichier['titre'] }}</span>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex justify-content-start flex-column">
                                                <span class="text-dark fw-bolder text-hover-primary fs-6">{{ $fichier['description'] }}</span>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="d-flex justify-content-end flex-shrink-0">
                                            {{--                                            @dd(storage_path($fichier['pathFJN']))--}}
                                            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                          
                                            <a href="{{ route('fichierJoinNotifications.download',$fichier->id) }}"   class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                <span class="svg-icon svg-icon-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                                        <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </a>
                                            <a href=" {{ route('fichierJoinNotifications.show' , ['id' => $fichier['id']]) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"></path>
                                                <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"></path>
                                            </svg>
                                        </span>
                                                <!--end::Svg Icon-->
                                            </a>

                                            <a href=" {{ route('fichierJoinNotifications.delete' , ['id' => $fichier['id']]) }}" class="btn btn-icon delete-record btn-bg-light btn-active-color-primary btn-sm me-1">


                                                <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                                <span class="svg-icon svg-icon-3 btn ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black"></path>
                                                <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black"></path>
                                                <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black"></path>
                                            </svg>
                                        </span>
                                                <!--end::Svg Icon-->
                                            </a>

                                        </div>
                                    </td>
                                </tr>

                            @endforeach
                        @endisset

                        </tbody>
                        <!--end::Table body-->


                    </table>

                    <!--end::Table-->




                </div>
                <!--end::Table container-->
            </div>
            <!--begin::Body-->
        </div>
        <!--end::Tables Widget 9-->
    </div>
@endsection
@push('scripts')
<script>
    $('.delete-record').on('click', function (e) {
    var href = $(this).attr('href');
    e.preventDefault();
    Swal.fire({
        title: 'Es-tu sûr?',
        text: "Vous ne pourrez pas revenir en arrière",
        icon: 'warning',
        type: 'warning',
        showCancelButton: true,
        cancelButtonText: "Quitter",
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui, supprimez-le!'
    })
        .then(function (result) {
            if (result.value) {
                location.href = href;
            }
        });
});
</script>
@endpush