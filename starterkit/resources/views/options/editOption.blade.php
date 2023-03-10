@extends('layout.master')


@section('content')



    <div class="row">
        <div class="col-12 ">
            <div class="card">
                <div class="card-body">
                    <div class="p-4 border rounded">
                        <form action="{{ isset($model) ? route('option.update' , ['id' => $model['id_option']])  : route('option.store') }}" method="post" class="row g-3 needs-validation" novalidate enctype="multipart/form-data" >
                            @csrf

                            @isset($model)
                                @method('PUT')
                            @endisset

                            <div class="form-group col-lg-6 col-sm-12">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">Nom</span>
                                </label>
                                <input class="form-control form-control-lg form-control-solid" type="text" name="nom_option" required  placeholder="nom option"  value="{{old('nom_option' , $model->nom_option ?? null)}}">
                                @error('nom_option')
                                <small  style="color: red" class="is-invalid text-left alert alert-danger bg-light p-1">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>


                            <div class="form-group col-lg-6 col-sm-12">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="">Description</span>
                                </label>
                                <textarea name="description_option" class="form-control form-control form-control-solid" data-kt-autosize="true">{{old('description_option' , $model->description_option ?? null)}}</textarea>
                                @error('description_option')
                                <small  style="color: red" class="is-invalid text-left alert alert-danger bg-light p-1">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>


                            @empty($model)
                            <div class="form-group col-lg-12 col-sm-12">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="">Date</span>
                                </label>
                                <input class="form-control form-control-lg form-control-solid" type="date" name="date_creation" placeholder="date_creation" value="{{old('date_creation' , $model->date_creation ?? null)}}" >
                                @error('date_creation')
                                <small  style="color: red" class="is-invalid text-left alert alert-danger bg-light p-1">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                            @endempty


                            <div class="col-lg-6 col-sm-12 pt-5">
                                <input type="submit" class="btn btn-primary" value="Enregistrer">

                                <input type="reset" class="btn btn-warning" value="Annuler">
                            </div>



                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
