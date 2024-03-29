<!--begin::User account menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
	<!--begin::Menu item-->
	<div class="menu-item px-3">
		<div class="menu-content d-flex align-items-center px-3">
			<!--begin::Avatar-->
			<div class="symbol symbol-50px me-5">
                <x-media.image :alt="trans('words.logo')" :src="private_file(auth()->guard('admin')->user()['photo'])"  />
			</div>
			<!--end::Avatar-->
			<!--begin::Username-->
			<div class="d-flex flex-column">
				<div class="fw-bold d-flex align-items-center fs-5">{{ auth()->guard('admin')->user()->fullName() }}

            </div>
				<a href="#" class="fw-semibold text-muted text-hover-primary fs-7">{{ auth()->guard('admin')->user()->email }}</a>
			</div>
			<!--end::Username-->
		</div>
	</div>

	<div class="separator my-2"></div>

	<div class="menu-item px-5">
		<a href="{{ route('admin.profile') }}" class="menu-link px-5">My Profile</a>
	</div>




	<div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
		<a href="#" class="menu-link px-5">
			<span class="menu-title position-relative">Language
                @switch(app()->getLocale())
                    @case('ar')
                        <span class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">Arabic
			<img class="w-15px h-15px rounded-1 ms-2" src="{{ asset('assets/media/flags/morocco.svg') }}" alt="" /></span></span>
                    @break

                    @case('en')
                    <span class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">English
			<img class="w-15px h-15px rounded-1 ms-2" src="{{ image('flags/united-states.svg') }}" alt="" /></span></span>
                        @break

                    @case('fr')
                    <span class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">French
			<img class="w-15px h-15px rounded-1 ms-2" src="{{ image('flags/france.svg') }}" alt="" /></span></span>
                        @break
                @endswitch

		</a>
		<!--begin::Menu sub-->
		<div class="menu-sub menu-sub-dropdown w-175px py-4">


            <div class="menu-item px-3">
                <a href="{{ route('setLang' , 'ar') }}" class="menu-link d-flex px-5 active">
				<span class="symbol symbol-20px me-4">
					<img class="rounded-1" src="{{ asset('assets/media/flags/morocco.svg') }}" alt="" />
				</span>Arabic</a>
            </div>
			<div class="menu-item px-3">
				<a href="{{ route('setLang' , 'en') }}" class="menu-link d-flex px-5 active">
				<span class="symbol symbol-20px me-4">
					<img class="rounded-1" src="{{ image('flags/united-states.svg') }}" alt="" />
				</span>English</a>
			</div>





			<div class="menu-item px-3">
				<a href="{{ route('setLang' , 'fr') }}" class="menu-link d-flex px-5">
				<span class="symbol symbol-20px me-4">
					<img class="rounded-1" src="{{ image('flags/france.svg') }}" alt="" />
				</span>French</a>
			</div>
			<!--end::Menu item-->
		</div>
		<!--end::Menu sub-->
	</div>

	<div class="menu-item px-5">
        <form id="logout-form" action="" method="POST" style="display: none;">
            @csrf
        </form>
		<a href="{{ route('admin.logout') }}" class="menu-link px-5" >Sign Out</a>
	</div>
	<!--end::Menu item-->
</div>
<!--end::User account menu-->
