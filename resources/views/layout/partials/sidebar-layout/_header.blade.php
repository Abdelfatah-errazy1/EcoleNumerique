<!--begin::Header-->
<div id="kt_app_header" class="app-header">

    <div class="app-container container-fluid d-flex align-items-stretch justify-content-between">

        <div class="d-flex align-items-center d-lg-none ms-n2 me-2" title="Show sidebar menu">
            <div class="btn btn-icon btn-active-color-primary w-35px h-35px" id="kt_app_sidebar_mobile_toggle">
                {!! getSvgIcon('duotune/abstract/abs015.svg', 'svg-icon svg-icon-1') !!}</div>
        </div>

        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
            <a href="/" class="d-lg-none">
                <img alt="Logo" src="{{ image('logos/default-small.svg') }}" class="h-30px"/>
            </a>
        </div>

        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">
            @include('layout/partials/sidebar-layout/header._menu._menu')
            @auth('admin')
                @include('admin.partials._navbar')
            @endauth
            @guest("admin")
                 @include('layout/partials/sidebar-layout/header/_navbar')
            @endauth
        </div>

    </div>

</div>

