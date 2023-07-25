<!--begin:Menu item-->
<div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
    <!--begin:Menu link-->
    <span class="menu-link">
					<span class="menu-icon">{!! getSvgIcon('duotune/general/gen025.svg', 'svg-icon svg-icon-2') !!}</span>
					<span class="menu-title">Tableau de Bord</span>
					<span class="menu-arrow"></span>
				</span>
    <!--end:Menu link-->
    <!--begin:Menu sub-->
    <div class="menu-sub menu-sub-accordion">
        <!--begin:Menu item-->
        <div class="menu-item">
            <!--begin:Menu link-->
            <a class="menu-link" href="#">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                <span class="menu-title">Statistiques</span>
            </a>
            <!--end:Menu link-->
        </div>
        <!--end:Menu item-->
        <div class="menu-inner flex-column collapse" id="kt_app_sidebar_menu_dashboards_collapse">
            <!--begin:Menu item-->
            <div class="menu-item">
                <!--begin:Menu link-->
                <a class="menu-link" href="#">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
                    <span class="menu-title">Bidding</span>
                </a>
                <!--end:Menu link-->
            </div>
            <!--end:Menu item-->
            <!--begin:Menu item-->
            <div class="menu-item">
                <!--begin:Menu link-->
                <a class="menu-link" href="#">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
                    <span class="menu-title">POS System</span>
                </a>
                <!--end:Menu link-->
            </div>
            <!--end:Menu item-->
        </div>
        <div class="menu-item">
            <div class="menu-content">
                <a class="btn btn-flex btn-color-primary d-flex flex-stack fs-base p-0 ms-2 mb-2 toggle collapsible collapsed"
                   data-bs-toggle="collapse" href="#kt_app_sidebar_menu_dashboards_collapse"
                   data-kt-toggle-text="Moins">
                    <span data-kt-toggle-text-target="true">Plus</span>

                    {!! getSvgIcon('duotune/general/gen036.svg', 'svg-icon toggle-on svg-icon-2 me-0') !!}
                    {!! getSvgIcon('duotune/general/gen035.svg', 'svg-icon toggle-off svg-icon-2 me-0') !!}</a>
            </div>
        </div>
    </div>
    <!--end:Menu sub-->
</div>
<!--end:Menu item-->
