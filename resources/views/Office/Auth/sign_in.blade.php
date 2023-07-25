{{--@dd(session()->all())--}}
@extends('layout._auth')
@section('content')
    <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end ">
        <div class="bg-body d-flex flex-column flex-center rounded-4  p-10">
            <!--begin::Content-->
            <div class="d-flex flex-center flex-column align-items-stretch h-lg-100 w-md-400px">
                <!--begin::Wrapper-->
                <div class="d-flex flex-center flex-column-fluid pb-15 pb-lg-20">
                    <!--begin::Form-->
                    <form class="form w-100" novalidate="novalidate" method="post"
                          action="{{ route('office.login.check') }}" id="kt_sign_in_form">

                        @csrf
                        <div class="text-center mb-11">

                            <h1 class="text-dark fw-bolder mb-3">{{ trans('auth.login') }}</h1>

                        </div>


                        @if(isset($session) && $session->has('message'))
                            <!--begin::Alert-->
                            <div class="alert alert-danger d-flex align-items-center p-5">
                                <!--begin::Icon-->
                                <i class="ki-duotone ki-shield-tick fs-2hx text-success me-4"><span
                                        class="path1"></span><span class="path2"></span></i>
                                <!--end::Icon-->

                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column">
                                    <!--begin::Title-->
                                    <h4 class="mb-1 text-dark">Error</h4>
                                    <!--end::Title-->

                                    <!--begin::Content-->
                                    <span>
                                    {{ $session->get('message') }}
                                </span>
                                    <!--end::Content-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Alert-->
                        @endif


                        <div class="fv-row mb-8">
                            <!--begin::Email-->
                            <input type="text" placeholder="{{ trans('auth.username') }}" name="login" autocomplete="off"
                                   class="form-control bg-transparent" value="{{ old('login') }}" />

                        </div>

                        <div class="fv-row mb-3">
                            <!--begin::Password-->
                            <input type="password" placeholder="{{ trans('auth.password') }}" name="password" autocomplete="off"
                                   class="form-control bg-transparent"/>

                        </div>

                        <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                            <div>
                                <x-form.check-box checked name="s" :label="trans('auth.button_remember')"/>
                            </div>

                            <a href="{{ route('office.forgotPassword.view') }}"
                               class="link-primary">{{ trans('auth.password_forget') }}</a>

                        </div>

                        <div class="d-grid mb-10">
                            <button data-kt-indicator="off" onclick="this.setAttribute('data-kt-indicator' , 'on')" type="submit" id="kt_sign_in_submit" class="btn btn-primary">

                                <span class="indicator-label">
                                    {{ trans('auth.login') }}
                                </span>

                                <span class="indicator-progress">Please wait...
											<span class="spinner-border spinner-border-sm align-middle ms-2">

                                            </span>
                                </span>
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
