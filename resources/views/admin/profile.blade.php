@extends('layout.master')
@include('include.blade-components')
@section('page_title' , ucwords(trans('pages/admin/profile.page_title')))
@section('content')

    <div class="card mb-5 mb-xl-10">

        <div class="card-body pt-9 pb-0">

            <div class="notice d-flex mb-2 bg-light-warning rounded border-warning border border-dashed p-6">


                <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
														<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                                                              fill="currentColor"/>
														<rect x="11" y="14" width="7" height="2" rx="1"
                                                              transform="rotate(-90 11 14)" fill="currentColor"/>
														<rect x="11" y="17" width="2" height="2" rx="1"
                                                              transform="rotate(-90 11 17)" fill="currentColor"/>
													</svg>
												</span>


                <div class="d-flex flex-stack flex-grow-1">

                    <div class="fw-semibold">
                        <h4 class="text-gray-900 fw-bold">We need your attention!</h4>
                        <div class="fs-6 text-gray-700">Your payment was declined. To start using tools, please
                            <a class="fw-bold" href="../../demo1/dist/account/billing.html">Add Payment Method</a>.
                        </div>
                    </div>

                </div>

            </div>
            <div class="d-flex flex-wrap flex-sm-nowrap mb-3">

                <div class="me-7 mb-4">
                    <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                        <x-media.image :alt="trans('words.logo')"
                                       :src="private_file(auth()->guard('admin')->user()['photo'])"/>
      
                    </div>
                </div>


                <div class="flex-grow-1">

                    <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">

                        <div class="d-flex flex-column">

                            <div class="d-flex align-items-center mb-2">
                                <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">
                                    {{ auth()->guard('admin')->user()->fullName() }}
                                </a>


                            </div>


                            <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                <a href="#"
                                   class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">

                                    <span class="svg-icon svg-icon-4 me-1">
																	<svg width="18" height="18" viewBox="0 0 18 18"
                                                                         fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path opacity="0.3"
                                                                              d="M16.5 9C16.5 13.125 13.125 16.5 9 16.5C4.875 16.5 1.5 13.125 1.5 9C1.5 4.875 4.875 1.5 9 1.5C13.125 1.5 16.5 4.875 16.5 9Z"
                                                                              fill="currentColor"/>
																		<path
                                                                            d="M9 16.5C10.95 16.5 12.75 15.75 14.025 14.55C13.425 12.675 11.4 11.25 9 11.25C6.6 11.25 4.57499 12.675 3.97499 14.55C5.24999 15.75 7.05 16.5 9 16.5Z"
                                                                            fill="currentColor"/>
																		<rect x="7" y="6" width="4" height="4" rx="2"
                                                                              fill="currentColor"/>
																	</svg>
																</span>
                                    {{ auth()->guard('admin')->user()->job }}
                                </a>

                                <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">

                                    <span class="svg-icon svg-icon-4 me-1">
																	<svg width="24" height="24" viewBox="0 0 24 24"
                                                                         fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path opacity="0.3"
                                                                              d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z"
                                                                              fill="currentColor"/>
																		<path
                                                                            d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z"
                                                                            fill="currentColor"/>
																	</svg>
																</span>
                                    {{ auth()->guard('admin')->user()->email }}
                                </a>
                            </div>

                        </div>


                    </div>

                    <div class="d-flex flex-wrap flex-stack">

                        <div class="d-flex align-items-center w-200px w-sm-300px flex-column mt-3">
                            <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                <span class="fw-semibold fs-6 text-gray-400">
                                    {{ trans('pages/admin/profile.profile_compleation') }}
                                </span>
                                <span class="fw-bold fs-6">50%</span>
                            </div>
                            <div class="h-5px mx-3 w-100 bg-light mb-3">
                                <div class="bg-success rounded h-5px" role="progressbar" style="width: 50%;"
                                     aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>


            <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">

                <li class="nav-item mt-2">
                    <a class="nav-link text-active-primary ms-0 me-10 py-5 active" data-bs-toggle="tab"
                       href="#kt_tab_overview">
                        {{ ucfirst(trans('app.overview')) }}
                    </a>
                </li>

                <li class="nav-item mt-2">
                    <a class="nav-link text-active-primary ms-0 me-10 py-5 " data-bs-toggle="tab" href="#kt_tab_pane_8">
                        {{ ucfirst(trans('pages/admin/profile.profile_edit_details')) }}
                    </a>
                </li>

            </ul>


        </div>
    </div>

    <div class="card ">
        <div class="card-body">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="kt_tab_overview" role="tabpanel">
                    <div class="card-header p-0 cursor-pointer">
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">{{ trans('pages/admin/profile.profile_details') }}</h3>
                        </div>
                    </div>
                    <div class="card-body p-0">

                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted">
                                {{ trans('pages/admin/profile.fullname') }}
                            </label>
                            <div class="col-lg-8">
                                <span class="fw-bold fs-6 text-gray-800">
                                    {{ auth()->guard('admin')->user()->fullName() }}
                                </span>
                            </div>
                        </div>

                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted">
                                {{ trans('pages/admin/profile.birthday') }}
                            </label>
                            <div class="col-lg-8 fv-row">
                                <span
                                    class="fw-semibold text-gray-800 fs-6">  {{ auth()->guard('admin')->user()['birthday'] }}</span>
                            </div>
                        </div>

                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted">
                                {{ trans('elements.gender') }}
                            </label>
                            <div class="col-lg-8 d-flex align-items-center">
                                <span
                                    class="fw-bold fs-6 text-gray-800 me-2"> {{ auth()->guard('admin')->user()->gender->text() }}</span>
                            </div>
                        </div>


                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted">
                                {{ trans('elements.phone') }}
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                   data-bs-placement="top" title="phone must be verified"></i>
                            </label>
                            <div class="col-lg-8">
                                <a href="#"
                                   class="fw-semibold fs-6 text-gray-800 text-hover-primary"> {{ auth()->guard('admin')->user()['phone_number'] }}</a>
                            </div>
                        </div>

                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted">
                                {{ trans('pages/admin/profile.description') }}
                            </label>
                            <div class="col-lg-8">
                                <span class="fw-bold fs-6 text-gray-800">
                                     {{ auth()->guard('admin')->user()['description'] }}
                                </span>
                            </div>
                        </div>

                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted">
                                {{ trans('pages/admin/profile.job') }}
                            </label>
                            <div class="col-lg-8">
                                <span class="fw-bold fs-6 text-gray-800">
                                     {{ auth()->guard('admin')->user()['job'] }}
                                </span>
                            </div>
                        </div>

                        <div class="row mb-10">
                            <label class="col-lg-4 fw-semibold text-muted">
                                {{ trans('pages/admin/profile.role') }}
                            </label>
                            <div class="col-lg-8">
                                <span
                                    class="badge badge-{{ auth()->guard('admin')->user()->role->class() }}">{{ auth()->guard('admin')->user()->role->text() }}</span>
                            </div>
                        </div>


                        <div class="row mb-10">
                            <label class="col-lg-4 fw-semibold text-muted">
                                {{ trans('pages/admin/profile.status') }}
                            </label>
                            <div class="col-lg-8">
                                <span
                                    class="badge badge-{{ auth()->guard('admin')->user()->status->class() }}">{{ auth()->guard('admin')->user()->status->text() }}</span>
                            </div>
                        </div>


                        <div class="row mb-10">
                            <label class="col-lg-4 fw-semibold text-muted">
                                {{ trans('pages/admin/profile.created_by') }}
                            </label>
                            <div class="col-lg-8">
                                <span
                                    class="badge badge-{{ auth()->guard('admin')->user()->status->class() }}">{{ auth()->guard('admin')->user()->status->text() }}</span>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="tab-pane fade" id="kt_tab_pane_8" role="tabpanel">
                    <div id="kt_account_settings_profile_details" class="collapse show">
                        <div class="card-header p-0 cursor-pointer">
                            <div class="card-title m-0">
                                <h3 class="fw-bold m-0">{{ trans('pages/admin/profile.profile_edit_details') }}</h3>
                            </div>
                        </div>
                        <form  enctype="multipart/form-data" action="{{ route('admin.profile.saveDetails') }}"   method="post">
                            @csrf
                            @bind(\App\Helpers\ConnectedAdmin::get())
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">{{ trans('elements.avatar') }}</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8">
                                  <x-form.file name="{{ config('tables.admins.columns.photo') }}"  :show-labele="false" />
                                </div>

                            </div>
                            <div class="row mb-6">

                                <label class="col-lg-4 col-form-label required fw-semibold fs-6">Full Name</label>

                                <div class="col-lg-8">

                                    <div class="row">

                                        <div class="col-lg-6 fv-row">
                                            <x-form.input  :name="config('tables.admins.columns.first_name')"  :show-labele="false"/>

                                        </div>

                                        <div class="col-lg-6 fv-row">
                                            <x-form.input  :name="config('tables.admins.columns.last_name')"  :show-labele="false"/>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row mb-6">

                                <label class="col-lg-4 col-form-label required fw-semibold fs-6">Birthday</label>

                                <div class="col-lg-8 fv-row">
                                    <x-form.input-date  :name="config('tables.admins.columns.birthday')"  :show-labele="false" identifer="fdsf" />
                                </div>

                            </div>
                            <div class="row mb-6">

                                <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span class="required">
                                    {{ trans('elements.gender') }}
                                </span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                       title="Phone number must be active">

                                    </i>
                                </label>

                                <div class="col-lg-8 fv-row">
                                    <x-form.select  :name="config('tables.admins.columns.gender')"  :show-labele="false" :options="\App\Enums\AdminGender::toArray()"  />
                                </div>

                            </div>
                            <div class="row mb-6">

                                <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                    {{ trans('elements.phone') }}
                                </label>

                                <div class="col-lg-8 fv-row">
                                    <x-form.input  :name="config('tables.admins.columns.phone_number')"  :show-labele="false"  />
                                </div>

                            </div>
                            <div class="row mb-6">

                                <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                    {{ trans('elements.email') }}
                                </label>

                                <div class="col-lg-8 fv-row">
                                    <x-form.input  :name="config('tables.admins.columns.email')"  :show-labele="false"  />
                                </div>

                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                    {{ trans('pages/admin/profile.description') }}
                                </label>
                                <div class="col-lg-8 fv-row">
                                    <x-form.text-area  :name="config('tables.admins.columns.description')"  :show-labele="false"  />
                                </div>
                            </div>

                            <x-form.button/>
                            @endBinding
                        </form>


                    </div>
                </div>

                <div class="tab-pane fade" id="kt_tab_pane_9" role="tabpanel">
                    ...
                </div>
            </div>
        </div>
    </div>

@endsection



