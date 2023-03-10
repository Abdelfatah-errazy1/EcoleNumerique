@extends('layout.master')


@section('content')

    <div class="col-xl-12">
        <!--begin::Tables Widget 9-->
        <div class="card card-xl-stretch mb-5 mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">

                <span class="text-center h1">Liste Des Options</span>
                <div class="ms-auto">



                    <div class="btn-group">
                        <button type="button" class="btn btn-success">Actions</button>
                        <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split"
                                data-bs-toggle="dropdown" aria-expanded="false"><span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">

                            <a href="{{route('option.create')}}" class="dropdown-item"> <i class="las la-plus"></i> Ajouter nouveau</a>
                            <a href="{{route('options.delete')}}" class="dropdown-item"> <i class="las la-trash-alt"></i> Supprimer La Selection</a>

                        </div>

                    </div>

                </div>


            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-3">
                <!--begin::Table container-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="table">
                        <!--begin::Table head-->
                        <thead>
                        <tr class="fw-bolder text-muted">
                            <th class="no-content  pr-1">
                                <div class="form-check">
                                    <input id="check_all_rows" class="form-check-input chkAll" type="checkbox">
                                </div>
                            </th>
                            <th class="min-w-150px"> nom</th>
                            <th class="min-w-140px"> description</th>
                            <th class="min-w-120px"> date</th>

                            <th class="min-w-100px text-end"> Actions </th>
                        </tr>
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->


                        <tbody>
                        @isset($data)
                            @foreach ($data as $option)
                                <tr>

                                    <td style="padding-right: 30px;">
                                        <div class="form-check">
                                            <input class="form-check-input rows-chGrid" type="checkbox"
                                                   value="{{ $option['id_option'] }}">
                                        </div>
                                    </td>

                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex justify-content-start flex-column">
                                                <span class="text-dark fw-bolder text-hover-primary fs-6">{{ $option['nom_option'] }}</span>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex justify-content-start flex-column">
                                                <span class="text-dark fw-bolder text-hover-primary fs-6">{{ $option['description_option'] }}</span>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex justify-content-start flex-column">
                                                <span class="text-dark fw-bolder text-hover-primary fs-6">{{ $option['date_creation'] }}</span>
                                            </div>
                                        </div>
                                    </td>



                                    <td>
                                        <div class="d-flex justify-content-end flex-shrink-0">
                                            <a href=" {{ route('option.show' , ['id' => $option['id_option']]) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"></path>
                                                <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"></path>
                                            </svg>
                                        </span>
                                                <!--end::Svg Icon-->
                                            </a>

                                            <a href=" {{ route('option.delete' , ['id' => $option['id_option']]) }}" class="btn btn-icon delete-record btn-bg-light btn-active-color-primary btn-sm me-1">


                                                <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                                <span class="svg-icon svg-icon-3">
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

    <link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css"/>
    <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>

    <script>

        $("#check_all_rows").on('click',function () {
            $(".rows-chGrid").prop("checked", $(this).prop("checked"));
        });

        let datatable = $('#table').DataTable({
            lengthMenu: [
                [5, 10, 25, -1],
                [5, 10, 25, 'All'],
            ],


        });




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


        $('a[href="{{ route('options.delete') }}"]').on('click', function (e) {

            e.preventDefault();


            window.ids = [];

            window.href = "{{ route('options.delete') }}";


            $(".rows-chGrid:checked").each(function () {
                    window.ids.push($(this).prop("value"));
                }
            );


            if (window.ids.length) {
                Swal.fire({
                    title: 'Es-tu sûr?',
                    text: "Vous ne pourrez pas revenir en arrière",
                    type: 'warning',
                    cancelButtonText: "annuler",
                    showCancelButton: true,
                    confirmButtonText: 'confirmer',
                    padding: '2em'
                })
                    .then(function (result) {
                        if (result.value) {
                            $.ajax({
                                url: window.href,
                                type: 'post',
                                data: {
                                    '_token': " {{ csrf_token() }}",
                                    'ids': window.ids,
                                },
                                success: function () {


                                    delete (window.href);
                                    delete (window.ids);
                                    location.reload();
                                },
                                error: function ({responseText}) {
                                    console.log(responseText)
                                }
                            });
                        }
                    });
            }
        });




        @if(session()->has('message'))
        @php
            if(session()->get('message')[0] === 1){

                if(isset(session()->get('message')[2])){
                    $return_value = session()->get('message')[2];
                }else{
                    $return_value = match ( session()->get('message')[1] ?? -1) {
             0 => 'Ajout Avec Succès',
              1 => 'Mise à jour terminée avec succès',
              2 => 'suppression terminée avec succès',
              -1 => ''
          };
                }

            }
        @endphp

        Swal.fire({
            title: "{{ session()->get('message')[0] == 1 ?  $return_value: session()->get('message')[1] ?? "quelque chose est mal passé essaie encore" }}",
            type: "{{ session()->get('message')[0] == 1 ? 'success' :  'error' }}",
            icon: "{{ session()->get('message')[0] == 1 ? 'success' :  'error' }}",
            confirmButtonText: 'Continuer',
            padding: '2em'
        });
        @endif


    </script>





@endpush
