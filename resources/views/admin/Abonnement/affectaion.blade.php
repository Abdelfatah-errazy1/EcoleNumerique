@extends('layout.master')
@include('include.blade-components')
@section('page_title' , ucwords(trans('pages/abonnements/affectation.affectation_des_abonnements')))
@section('breadcrumb')
    <x-group.bread-crumb
        :page-tittle="ucwords(trans('pages/abonnements/affectation.affectation_des_abonnements'))"
        :indexes="[
           [
               'name'=> trans('elements.liste_des_abonnements'),
               'route'=> route('admin.abonnements.index')
           ],
        ]"
    />

@endsection
@push('styles')

    <style>
        /*tbody tr {*/
        /*    cursor: pointer;*/
        /*}*/

        tbody tr.selected {
            background-color: #01446a;
        }
    </style>
@endpush
@section("content")
    <div class="card">
        <div class="card-body">
            <div class="row">
                <input type="hidden" name="current-row">

                    <x-form.select col="col-4" required :label="trans('elements.etablissement')" name="etablissement" :bind-with="[$data['etablissement'],[config('tables.etablissements.columns.id') , config('tables.etablissements.columns.name_FR')]]"/>
                    <x-form.select col="col-4" required :label="trans('elements.Centre_de_Formation')" name="center"/>
                    <x-form.select col="col-4" required :label="trans('elements.abonnement')" name="abonement" :bind-with="[$data['abonements'],[config('tables.abonnements.columns.id') , config('tables.abonnements.columns.title')]]"/>
                    <x-form.select col="col-4" required :label="trans('pages/abonnements/affectation.etat')"  name="etat" :horizontal="false"

                                   :options="[
                                        'ABN' => 'Abonné',
                                        'ABE' => 'Abonnement Epuisé',
                                        'ABB' => 'Abonnement Bloqué'
                                    ]"
                    />
                    <x-form.input-date col="col-4" :horizontal="false" required :label="trans('pages/abonnements/affectation.date_debut')" name="date_debut"/>
                    <x-form.input-date col="col-4" :horizontal="false" required  :label="trans('pages/abonnements/affectation.date_fin')" name="date_fin"/>


                <div class="col-12 mt-4">
                    <input type="submit" class="btn btn-primary" value="{{trans('app.save')}}" id="btn-save">
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-5">
            <div class="card-body">
                <div class="card-title">
                    <div class="d-flex align-items-center position-relative my-1">
                                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                       xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                          transform="rotate(45 17.0365 15.1223)" fill="currentColor"/>
                                    <path
                                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                        fill="currentColor"/>
                                  </svg>
                                </span>
                        <label>
                            <input type="text" data-kt-user-table-filter="search"
                                   class="form-control form-control-solid w-250px ps-14"
                                   placeholder=""/>
                        </label>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="table" class="table table-row-dashed align-middle gs-0 gy-4" style="width: 100%;">

                        <thead>
                        <tr  class="fw-bolder text-muted">
                            <th>{{trans('elements.etablissement')}}</th>
                            <th>{{trans('elements.title')}}</th>
                            <th>{{trans('elements.tarif_vente')}}</th>
                            <th>{{trans('pages/abonnements/affectation.date_debut')}}</th>
                            <th>{{trans('pages/abonnements/affectation.date_fin')}}</th>
                            <th>{{trans('pages/abonnements/affectation.etat')}}</th>
                            <th class="no-content  pr-1">{{trans('app.actions')}}</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    <div class="modal fade" tabindex="-1" id="exampleModalLong" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{trans('app.edit')}}</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body row">
                    <input type="hidden" name="{{ \App\Models\CentreFormationAbonnement::PK }}">
                    <x-form.select col="col-lg-12 col-sm-12" :label="trans('elements.abonnement')" name="m_abonement" :horizontal="false" :bind-with="[$data['abonements'],[config('tables.abonnements.columns.id') , config('tables.abonnements.columns.title')]]"/>
                    <x-form.select  col="col-lg-12 col-sm-12" :label="trans('pages/abonnements/affectation.etat')"  name="m_etat" :horizontal="false"
                                   :options="[
                                    'ABN' => 'Abonné',
                                    'ABE' => 'Abonnement Epuisé',
                                    'ABB' => 'Abonnement Bloqué'
                                ]"
                    />
                    <x-form.input-date  col="col-lg-6 col-sm-12" :horizontal="false" required :label="trans('pages/abonnements/affectation.date_debut')" name="m_date_debut"/>
                    <x-form.input-date col="col-lg-6 col-sm-12"  :horizontal="false" required  :label="trans('pages/abonnements/affectation.date_fin')" name="m_date_fin"/>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">{{trans('app.close')}}</button>
                    <button type="button"  id="modal-save" class="btn btn-primary">{{trans('app.save')}}</button>
                </div>
            </div>
        </div>
    </div>

@endsection


        @push('scripts')

            <script>


                const datatable = $('#table').DataTable({

                    "info": false,
                    "bLengthChange": false, //thought this line could hide the LengthMenu
                    "bInfo": false,
                    'order': [],
                    'pageLength': 10,
                    "lengthMenu": [5, 10, 15, 20],
                    "columnDefs": [
                        {targets: 'no-sort', orderable: false, "order": []}

                    ]
                });
                $('[data-kt-user-table-filter="search"]').on('keyup', function () {
                    datatable.search($(this).val()).draw();
                });


                let etablissementSelectEl = $('select[name=etablissement]');
                let centersSelectEl = $('select[name=center]');
                let abonementSelectEl = $('select[name=abonement]');
                let dateFinInputEl = $("input[name=date_fin]");
                let dateDebutInputEl = $("input[name=date_debut]");
                let etatSelectEl = $("select[name=etat]");
                let modalEl = $('#exampleModalLong');

                etablissementSelectEl.on('change', function () {

                        $.ajax({
                            url: "{{ route('admin.abonnements.affectation.filterCenter') }}",
                            type: 'post',
                            data: {
                                '_token': " {{ csrf_token() }}",
                                'etablissementId': etablissementSelectEl.val(),
                            },
                            success: function ({data, errors}) {

                                console.log(data);


                                if (errors) {
                                    if (errors.hasOwnProperty('etablissementId')) {
                                        etablissementSelectEl.parent().find('.text-danger').text(errors.etablissementId[0] ?? '');
                                    }
                                } else {

                                    // centersSelectEl.find('option').not(':first').remove();
                                    centersSelectEl.find('option').remove();

                                    if (Array.isArray(data)) {

                                        for (const datum of data) {
                                            let option = `<option value='${datum.{{config('tables.centreformations.columns.id')}}}' > ${datum.{{config('tables.centreformations.columns.name_FR')}}}</option>`;
                                            centersSelectEl.append(option);
                                        }
                                    }


                                }


                            },
                            error: function (err) {
                                console.log(err)
                            }
                        });

                });



                centersSelectEl.on('change', function () {
                    let $this = $(this).val();

                    $.ajax({
                        url: "{{ route('admin.abonnements.affectation.filterCabinetsAbonnements') }}",
                        type: 'post',
                        data: {
                            '_token': " {{ csrf_token() }}",
                            'center_id': $this,
                        },
                        success: function ({data, errors}) {

                            if (errors) {
                                if (errors.hasOwnProperty('abonnement_id')) {
                                    abonementSelectEl.parent().find('.text-danger').text(errors.abonnement_id[0] ?? '');
                                }
                            } else {

                                datatable
                                    .clear()
                                    .draw();


                                if(data) {
                                    for (const item of data) {


                                        let etat = '';
                                        switch (item.{{config('tables.centreformationsabonnement.columns.state')}}) {
                                            case 'ABN':
                                                etat = 'Abonné';
                                                break;
                                            case 'ABE':
                                                etat = 'Abonnement Épuisé';
                                                break;
                                            case 'ABB':
                                                etat = 'Abonnement Bloqué';
                                                break;
                                        }



                                        let trEl = `
                                    <tr class="" data-id="${item.{{ \App\Models\CentreFormationAbonnement::PK }}}">
                                        <td>
                                            <input class="form-check-input chGrid" type="hidden" value="${item.{{config('tables.centreformationsabonnement.columns.id')}}}"  >
                                             ${item.etablissementInfo}
                                        </td>
                                        <td data-titreAbnAr="${item.{{config('tables.abonnements.columns.title')}}}">
                                             ${item.{{config('tables.abonnements.columns.title')}}}
                                        </td>

                                        <td>
                                             ${item.{{config('tables.abonnements.columns.tarif_vente')}}}
                                        </td>

                                        <td data-dateDebut="${item.{{config('tables.centreformationsabonnement.columns.date_start')}}}">
                                             ${item.{{config('tables.centreformationsabonnement.columns.date_start')}}}
                                        </td>

                                        <td data-dateFin="${item.{{config('tables.centreformationsabonnement.columns.date_end')}}}">
                                             ${item.{{config('tables.centreformationsabonnement.columns.date_end')}}}
                                        </td>


                                       <td data-etat="${etat}">
                                             ${etat}
                                        </td>

                            <td>

                                <div>
                                   <button type="button" class="btn btn-primary datatable-edit-row">
                                    <span class="btn-label">
                                    <i class="bi bi-vector-pen fs-2"></i>
                                    </span></button>
                                </div>

                            </td>

                                                        </tr>`;
                                        datatable.row.add($(trEl)).draw();

                                        $('.datatable-edit-row').off('click').on('click', function () {

                                            let tr = $(this).closest('tr');
                                            let id = tr.attr('data-id');
                                            modalEl.find('[name="{{\App\Models\CentreFormationAbonnement::PK}}"]').val(id)

                                            let titreAbnAr = tr.find('[data-titreAbnAr]').attr('data-titreAbnAr');
                                            let dateDebut = tr.find('[data-dateDebut]').attr('data-dateDebut');
                                            let dateFin = tr.find('[data-dateFin]').attr('data-dateFin');
                                            let etat = tr.find('[data-etat]').attr('data-etat');


                                            // $(`[name=m_abonement] option:contains(${titreAbnAr})`).attr('selected', true).trigger('change');
                                            $(`[name=m_etat] option:contains(${etat})`).attr('selected', true).trigger('change');

                                            let date_debutModalEl = modalEl.find('[name=m_date_debut]');
                                            date_debutModalEl.val(dateDebut)
                                            let date_finModalEl = modalEl.find('[name=m_date_fin]');
                                            date_finModalEl.val(dateFin)



                                            modalEl.modal('toggle');
                                        });
                                        $('#btn-save').addClass('d-none');

                                        $('#modal-save').off('click').on('click', function () {



                                            let abonementModalSelectEl = modalEl.find('[name=m_abonement]');
                                            let etatModalSelectEl = modalEl.find('[name=m_etat]');
                                            let dateDebutModalInputDateEl = modalEl.find('[name=m_date_debut]');
                                            let dateFinModalInputDateEl = modalEl.find('[name=m_date_fin]');




                                            let data = {
                                                'id': modalEl.find('[name="{{ \App\Models\CentreFormationAbonnement::PK }}"]').val(),
                                                'abonnement': abonementModalSelectEl.val(),
                                                'dateFin': dateFinModalInputDateEl.val(),
                                                'dateDebut': dateDebutModalInputDateEl.val(),
                                                'etat': etatModalSelectEl.val(),
                                            };



                                            axios.post("{{ route('admin.abonnements.affectation.update') }}", data)

                                                .then(function ({data , message}) {


                                                    if (data.errors) {
                                                        let errors  = data.errors;
                                                        if (errors.hasOwnProperty('abonnement')) {
                                                            abonementModalSelectEl.parent().find('.text-danger').text(errors.abonnement[0] ?? '');
                                                        }

                                                        if (errors.hasOwnProperty('dateFin')) {
                                                            dateFinModalInputDateEl.find('.text-danger').text(errors.dateFin[0] ?? '');
                                                        }


                                                        if (errors.hasOwnProperty('dateDebut')) {
                                                            dateDebutModalInputDateEl.find('.text-danger').text(errors.dateDebut[0] ?? '');
                                                        }


                                                        if (errors.hasOwnProperty('etat')) {
                                                            etatModalSelectEl.parent().find('.text-danger').text(errors.etat[0] ?? '');
                                                        }

                                                    }else{

                                                        datatable
                                                            .clear()
                                                            .draw();

                                                        Swal.fire({
                                                            title: "succès",
                                                            text: "abonement center mis a jour a été  avec succés",
                                                            type: "success",
                                                            icon: 'success',
                                                            confirmButtonText: 'terminé',
                                                            padding: '2em'
                                                        })
                                                            .then(function (result) {
                                                                if (result.value) {
                                                                    location.reload();
                                                                }
                                                            });


                                                    }






                                                })
                                                .catch(function (error) {
                                                    console.log(error);
                                                });


                                        })
                                    }
                                }
                                else{
                                    $('#btn-save').removeClass('d-none');
                                }
                            }
                        },
                        error: function (error) {
                            console.log(error);

                        },
                    });
                });





                $('#btn-save').on('click', function () {

                    $.ajax({
                        url: "{{ route('admin.abonnements.affectation.add') }}",
                        type: 'post',
                        data: {
                            '_token': " {{ csrf_token() }}",
                            'etab': etablissementSelectEl.val(),
                            'center': centersSelectEl.val(),
                            'abonnement': abonementSelectEl.val(),
                            'dateFin': dateFinInputEl.val(),
                            'dateDebut': dateDebutInputEl.val(),
                            'etat': etatSelectEl.val(),
                        },
                        success: function ({message, errors}) {
                            $('.text-danger').text('');

                            console.log(errors);
                            if (errors) {

                                if (errors.hasOwnProperty('abonnement')) {
                                    abonementSelectEl.parent().find('.text-danger').text(errors.abonnement[0] ?? '');

                                }

                                if (errors.hasOwnProperty('center')) {
                                     centersSelectEl.parent().find('.text-danger').text(errors.center[0] ?? '');
                                }
                                if (errors.hasOwnProperty('etab')) {
                                    etablissementSelectEl.parent().find('.text-danger').text(errors.etab[0] ?? '');
                                }

                                if (errors.hasOwnProperty('dateFin')) {

                                    dateFinInputEl.parent().find('.text-danger').text(errors.dateFin[0] ?? '');
                                }

                                if (errors.hasOwnProperty('dateDebut')) {

                                    dateDebutInputEl.parent().find('.text-danger').text(errors.dateDebut[0] ?? '');
                                }


                                if (errors.hasOwnProperty('etat')) {
                                    etatSelectEl.parent().find('.text-danger').text(errors.etat[0] ?? '');
                                }

                            } else {
                                if (message === "added") {

                                    Swal.fire({
                                        title: "succès",
                                        text: "abonement center  ajouté a été avec succès",
                                        type: "success",
                                        icon: 'success',
                                        confirmButtonText: 'terminé',
                                        padding: '2em'
                                    })
                                        .then(function (result) {
                                            if (result.value) {
                                                location.reload();
                                            }
                                        });


                                } else {

                                    Swal.fire({
                                        title: "error",
                                        text: "abonement center deja exists",
                                        type: "error",
                                        confirmButtonText: 'terminé',
                                        padding: '2em'
                                    });
                                }

                            }


                        },
                        error: function ({responseText}) {
                            console.log(responseText)
                        }
                    });
                });


            </script>
        @endpush




