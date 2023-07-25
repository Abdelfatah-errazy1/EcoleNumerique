<!--begin::Navbar-->
<div class="app-navbar flex-shrink-0">
    <!--begin::Search-->
    <div class="app-navbar-item align-items-stretch ms-1 ms-lg-3">
        @include(config('settings.KT_THEME_LAYOUT_DIR').'/partials/sidebar-layout/search/_dropdown')
    </div>
    <!--end::Search-->
    <!--begin::Notifications-->
    {{-- <div class="app-navbar-item ms-1 ms-lg-3">
        <!--begin::Menu- wrapper-->
        <div
            class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-35px h-35px w-md-40px h-md-40px"
            data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
            data-kt-menu-placement="bottom-end">
            <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
            {!! getSvgIcon('duotune/general/gen022.svg', 'svg-icon svg-icon-1') !!}
            <!--end::Svg Icon-->
        </div>
        @include('partials/menus/_notifications-menu')
        <!--end::Menu wrapper-->
    </div> --}}
    <!--end::Notifications-->
    <!--begin::My apps links-->
    {{-- <div class="app-navbar-item ms-1 ms-lg-3">
        <!--begin::Menu wrapper-->
        <div
            class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-35px h-35px w-md-40px h-md-40px"
            data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
            data-kt-menu-placement="bottom-end">
            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
            {!! getSvgIcon('duotune/general/gen025.svg', 'svg-icon svg-icon-1') !!}
            <!--end::Svg Icon-->
        </div>
        @include('partials/menus/_my-apps-menu')
        <!--end::Menu wrapper-->
    </div> --}}
    <!--end::My apps links-->
    <!--begin::Theme mode-->
    <div class="app-navbar-item ms-1 ms-lg-3">
        @include('partials/theme-mode/_main')
    </div>

    <div class="app-navbar-item ms-1 ms-lg-3">
        <a href="https://www.atlecs.net" target="_blank">
            <div class="cursor-pointer symbol symbol-35px symbol-md-40px bg-light-dark"
                 data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                 data-kt-menu-placement="bottom-end">
                <img src="{{ asset('assets/imgs/atlecs.png') }}" alt="atlecs"/>
            </div>
        </a>
    </div>

    <div class="app-navbar-item ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
        <!--begin::Menu wrapper-->
        <div class="cursor-pointer symbol symbol-35px symbol-md-40px"
             data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
             data-kt-menu-placement="bottom-end">
             
            <x-media.image  :src="private_file(auth()->guard('admin')->user()['photo'])"  />
        </div>
        @include('admin.partials._user-account-menu')

    </div>

    <div class="app-navbar-item d-lg-none ms-2 me-n3" title="Show header menu">
        <div class="btn btn-icon btn-active-color-primary w-35px h-35px" id="kt_app_header_menu_toggle">
            <!--begin::Svg Icon | path: icons/duotune/text/txt001.svg-->
            {!! getSvgIcon('duotune/text/txt001.svg', 'svg-icon svg-icon-1') !!}

        </div>
    </div>

</div>

