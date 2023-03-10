@extends('layout.master')


@section('content')



        <div class="row">
            <div class="col-12 ">
                <div class="card">
                    <div class="card-body">
                        <div class="p-4 border rounded">
                            <form action="{{ isset($model) ? route('user.update' , ['id' => $model['id']])  : route('user.store') }}" method="post" class="row g-3 needs-validation" novalidate enctype="multipart/form-data" >
                                @csrf

                                @isset($model)
                                    @method('PUT')
                                @endisset

                                <div class="form-group col-lg-6 col-sm-12">
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                                        <span class="required">Nom</span>
                                    </label>
                                    <input class="form-control form-control-lg form-control-solid" type="text" name="nom" required  placeholder="nom"  value="{{old('nom' , $model->nom ?? null)}}">
                                        @error('nom')
                                        <small  style="color: red" class="is-invalid text-left alert alert-danger bg-light p-1">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                </div>


                                <div class="form-group col-lg-6 col-sm-12">
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">prenom</span>
                                 </label>
                                 <input class="form-control form-control-lg form-control-solid" type="text" name="prenom" placeholder="prenom" value="{{old('prenom' , $model->prenom ?? null)}}" >
                                        @error('prenom')
                                        <small  style="color: red" class="is-invalid text-left alert alert-danger bg-light p-1">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                </div>


                                <div class="form-group col-lg-6 col-sm-12">
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="">ville</span>
                                 </label>
                                 <input class="form-control form-control-lg form-control-solid" type="text" name="ville" placeholder="ville" value="{{old('ville' , $model->ville ?? null)}}" >
                                        @error('ville')
                                        <small  style="color: red" class="is-invalid text-left alert alert-danger bg-light p-1">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                </div>


                                <div class="form-group col-lg-6 col-sm-12">
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="">codepostal</span>
                                 </label>
                                 <input class="form-control form-control-lg form-control-solid" type="text" name="codepostal"  placeholder="codepostal" value="{{old('codepostal' , $model->codepostal ?? null)}}" >
                                        @error('codepostal')
                                        <small  style="color: red" class="is-invalid text-left alert alert-danger bg-light p-1">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                </div>



                                <div class="form-group col-lg-6 col-sm-12">
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">
                                        <span class="required">email</span>
                                    </label>
                                    <input class="form-control form-control-lg form-control-solid" type="email" name="email" id="email" placeholder="email"  value="{{old('email' , $model->email ?? null)}}">
                                            @error('email')
                                            <small  style="color: red" class="is-invalid text-left alert alert-danger bg-light p-1">
                                                {{ $message }}
                                            </small>
                                            @enderror
                                </div>



                                <div class="form-group col-lg-6 col-sm-12">
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">
                                        <span class="" style="width: 50%;">webSite</span>
                                    </label>
                                    <input class="form-control form-control-lg form-control-solid" required type="text" name="webSite" id="webSite" placeholder="webSite" value="{{old('webSite' , $model->webSite ?? null)}}" >
                                            @error('webSite')
                                            <small  style="color: red" class="is-invalid text-left alert alert-danger bg-light p-1">
                                                {{ $message }}
                                            </small>
                                            @enderror
                                </div>

                                <div class="form-group col-lg-6 col-sm-12">
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required" style="width: 50%;">tel</span>
                                </label>
                                    <input class="form-control form-control-lg form-control-solid" required type="text" name="tel" id="tel" placeholder="tel" value="{{old('tel' , $model->tel ?? null)}}" >
                                            @error('tel')
                                            <small  style="color: red" class="is-invalid text-left alert alert-danger bg-light p-1">
                                                {{ $message }}
                                            </small>
                                            @enderror
                                </div>

                                <div class="form-group col-lg-6 col-sm-12">
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="" style="width: 50%;">Cin</span>
                                </label>
                                    <input class="form-control form-control-lg form-control-solid" required type="text" name="CIN" id="CIN" placeholder="Cin" value="{{old('CIN' , $model->CIN ?? null)}}" >
                                            @error('CIN')
                                            <small  style="color: red" class="is-invalid text-left alert alert-danger bg-light p-1">
                                                {{ $message }}
                                            </small>
                                            @enderror
                                </div>


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
