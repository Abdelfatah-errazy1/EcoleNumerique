<!--begin::sidebar menu-->
<div class="app-sidebar-menu overflow-hidden flex-column-fluid">
	<!--begin::Menu wrapper-->
	<div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true"
		data-kt-scroll-activate="true" data-kt-scroll-height="auto"
		data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
		data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px">
		<!--begin::Menu-->
		<div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true"
			data-kt-menu-expand="false">

            <div data-kt-search-element="wrapper">
                {{-- Admin area --}}
                @auth('admin')
                    {{-- Only authenticated admins can see this --}}
                    @include(config('settings.KT_THEME_LAYOUT_DIR').'/partials/sidebar-layout/sidebar/menu-included/super-admin')
                    @include(config('settings.KT_THEME_LAYOUT_DIR').'/partials/sidebar-layout/sidebar/menu-included/admin')
                    @include(config('settings.KT_THEME_LAYOUT_DIR').'/partials/sidebar-layout/sidebar/menu-included/scolarite')
                    @include(config('settings.KT_THEME_LAYOUT_DIR').'/partials/sidebar-layout/sidebar/menu-included/enseignant')
                    @include(config('settings.KT_THEME_LAYOUT_DIR').'/partials/sidebar-layout/sidebar/menu-included/directeur-etablissement')
                    @include(config('settings.KT_THEME_LAYOUT_DIR').'/partials/sidebar-layout/sidebar/menu-included/directeur-centerformation')
                    {{-- @include(config('settings.KT_THEME_LAYOUT_DIR').'/partials/sidebar-layout/sidebar/menu-included/gestion-espace') --}}
                @endauth

            </div>

		</div>
		<!--end::Menu-->
	</div>
	<!--end::Menu wrapper-->
</div>
<!--end::sidebar menu-->
