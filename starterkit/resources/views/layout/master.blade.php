<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" {{ printHtmlAttributes('html') }}>
<!--begin::Head-->
<head>
    <base href=""/>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8"/>
    <meta name="page-id" content=""/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta property="og:locale" content="en_US"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content=""/>
    <link rel="canonical" href=""/>

    <link rel="shortcut icon" href="http://127.0.0.1:8000/assets/media/logos/favicon.ico" />

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700">
    <!--end::Fonts-->

    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link rel="stylesheet" href="http://127.0.0.1:8000/assets/plugins/global/plugins.bundle.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/assets/css/style.bundle.css">
    <!--end::Global Stylesheets Bundle-->

    <!--begin::Vendor Stylesheets(used by this page)-->

    <!--end::Vendor Stylesheets-->

    <!--begin::Custom Stylesheets(optional)-->

{{--    <link rel="stylesheet" href="http://127.0.0.1:8000/assets/plugins/custom/datatables/datatables.bundle.css">--}}
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>

    <style>
        [data-dtr-index]{
            width: 100% !important;
        }
        .dataTables_filter, .dataTables_info { display: none; }
        .no-sort::after { display: none!important; }

        .no-sort {  cursor: default!important; }
    </style>
    <!--end::Custom Stylesheets-->
</head>
<!--end::Head-->

<!--begin::Body-->
<body id="kt_app_body" {!! printHtmlClasses('body') !!} {!! printHtmlAttributes('body') !!}>

@include('partials/theme-mode/_init')

<div class="d-flex flex-column flex-root" id="kt_app_root">
    <!--begin::Page-->
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
        @include(config('settings.KT_THEME_LAYOUT_DIR').'/partials/sidebar-layout/_header')
        <!--begin::Wrapper-->
        <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
            @include(config('settings.KT_THEME_LAYOUT_DIR').'/partials/sidebar-layout/_sidebar')
            <!--begin::Main-->
            <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                <!--begin::Content wrapper-->
                <div class="d-flex flex-column flex-column-fluid">

                    <!--begin::Content-->
                    <div id="kt_app_content" class="app-content flex-column-fluid">
                        <!--begin::Content container-->

                        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                            <div class="d-flex flex-column flex-column-fluid">
                                <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                                    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                                        @yield('breadcrumb')
                                    </div>
                                </div>
                                <div id="kt_app_content" class="app-content flex-column-fluid">
                                    <div id="kt_app_content_container" class="app-container container-xxl">
                                        @yield('content')
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Content container-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Content wrapper-->
                @include(config('settings.KT_THEME_LAYOUT_DIR').'/partials/sidebar-layout/_footer')
            </div>
            <!--end:::Main-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>

@include('partials/_drawers')

@include('partials/_modals')

@include('partials/_scrolltop')
















<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="http://127.0.0.1:8000/assets/plugins/global/plugins.bundle.js"></script>
<script src="http://127.0.0.1:8000/assets/js/scripts.bundle.js"></script>
<script src="http://127.0.0.1:8000/assets/js/widgets.bundle.js"></script>
<!--end::Global Javascript Bundle-->

<!--begin::Vendors Javascript(used by this page)-->
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
{{--<script src="http://127.0.0.1:8000/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>--}}
<!--end::Vendors Javascript-->

<!--begin::Custom Javascript(optional)-->
{{--<script src="http://127.0.0.1:8000/assets/js/custom/widgets.js"></script>--}}
{{--<script src="http://127.0.0.1:8000/assets/js/custom/apps/chat/chat.js"></script>--}}
{{--<script src="http://127.0.0.1:8000/assets/js/custom/utilities/modals/upgrade-plan.js"></script>--}}
{{--<script src="http://127.0.0.1:8000/assets/js/custom/utilities/modals/create-app.js"></script>--}}
{{--<script src="http://127.0.0.1:8000/assets/js/custom/utilities/modals/users-search.js"></script>--}}
{{--<script src="http://127.0.0.1:8000/assets/js/custom/utilities/modals/new-target.js"></script>--}}
<!--end::Custom Javascript-->
<!--end::Javascript-->




@stack('scripts')
</body>
<!--end::Body-->

</html>
