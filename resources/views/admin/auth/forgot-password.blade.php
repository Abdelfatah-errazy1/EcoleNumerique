@extends('layout._auth')
@section('content')
    <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">

        <div class="bg-body d-flex flex-column flex-center rounded-4 w-md-600px p-10">

            <div class="d-flex flex-center flex-column align-items-stretch h-lg-100 w-md-400px">

                <div class="d-flex flex-center flex-column-fluid pb-15 pb-lg-20">


                    <form class="form w-100" novalidate="novalidate" id="kt_password_reset_form" method="post" action="{{ route('admin.forgotPassword.check') }}">
                        @csrf

                        <div class="text-center mb-10">

                            <h1 class="text-dark fw-bolder mb-3">{{ trans('auth.password_forget') }}</h1>

                            @if(isset($session) && $session->has('message'))
                                <!--begin::Alert-->
                                <div class="alert alert-{{ $session->get('message')['type'] }} d-flex align-items-center p-5">
                                    <!--begin::Icon-->
                                    <i class="ki-duotone ki-shield-tick fs-2hx text-success me-4"><span
                                            class="path1"></span><span class="path2"></span></i>
                                    <!--end::Icon-->

                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-column">

                                        <span>
                                    {{ $session->get('message')['message'] }}
                                </span>
                                        <!--end::Content-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Alert-->
                            @endif

                        </div>

                        <div class="fv-row mb-8">

                            <input type="text" placeholder="{{ trans('auth.email') }}" name="email" autocomplete="off" class="form-control bg-transparent" />

                        </div>

                        <div class="d-flex flex-wrap justify-content-center pb-lg-0">
                            <button data-kt-indicator="off" onclick="this.setAttribute('data-kt-indicator' , 'on')" type="submit" id="kt_password_reset_submit" class="btn btn-primary me-4">

                                <span class="indicator-label">{{ trans('auth.password_reset_send_link') }}</span>
                                <span class="indicator-progress">
                                    Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>

                            </button>
                            <a href="{{ route('admin.login.view') }}" class="btn btn-light">{{ trans('app.cancel') }}</a>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>
@endsection
