<div id="kt_app_header" class="app-header" data-kt-sticky="true" data-kt-sticky-activate="{default: false, lg: true}"
    data-kt-sticky-name="app-header-sticky" data-kt-sticky-offset="{default: false, lg: '300px'}">
    <!--begin::Header container-->
    <div class="app-container container-fluid d-flex align-items-stretch justify-content-between"
        id="kt_app_header_container">
        <!--begin::Header primary-->
        <div class="d-flex align-items-center justify-content-between flex-row-fluid" id="kt_app_header_wrapper">
            <!--begin::Header logo-->
            <div class="app-header-logo d-flex align-items-center">
                <!--begin::Mobile toggle-->
                <div class="btn btn-icon btn-color-gray-500 btn-active-color-primary w-35px h-35px ms-n3 me-2 d-flex d-lg-none"
                    id="kt_app_sidebar_mobile_toggle">
                    <i class="ki-outline ki-abstract-14 fs-1"></i>
                </div>
                <!--end::Mobile toggle-->
                <!--begin::Logo image-->
                <a href="{{ route('user.dashboard') }}" class="me-5 me-lg-9">
                    <img alt="Logo" src="{{ asset('assets/media/emp-hours-tracker-logo.png') }}"
                        class="h-35px h-sm-50px" />
                </a>
                <!--end::Logo image-->
                <!--begin::Section-->
                <div class="d-none d-md-inline">
                    @php
                        $time = date('G');
                        if ($time < 12) {
                            $greeting = 'Good morning';
                        } elseif ($time < 17) {
                            $greeting = 'Good afternoon';
                        } else {
                            $greeting = 'Good evening';
                        }
                    @endphp
                    <div class="fw-bold fs-3 text-gray-900">{{ $greeting }}, <span>@yield('fullname')</span></div>
                    <div class="fw-semibold text-gray-500">Plan your blog post by choosing a topic</div>
                </div>
                <!--end::Section-->
            </div>
            <!--end::Header logo-->

            <!--begin::Navbar-->
            <div class="app-navbar flex-shrink-0">
                <!--begin::User menu-->
                <div class="app-navbar-item me-3" id="kt_header_user_menu_toggle">
                    <!--begin::Menu wrapper-->
                    <div class="btn btn-icon btn-icon-gray-600 border border-dashed border-gray-300 w-35px h-35px w-md-40px h-md-40px"
                        data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                        data-kt-menu-placement="bottom-end">
                        <i class="ki-outline ki-user fs-3"></i>
                    </div>
                    <!--begin::User account menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                        data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <div class="menu-content d-flex align-items-center px-3">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-50px me-5">
                                    <img alt="Logo" src="{{ asset('assets/media/avatars/300-5.jpg') }}" />
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Username-->
                                <div class="d-flex flex-column">
                                    <div class="fw-bold d-flex align-items-center fs-5">@yield('fullname')
                                    </div>
                                    <a href="#"
                                        class="fw-semibold text-muted text-hover-primary fs-7">@yield('email')</a>
                                </div>
                                <!--end::Username-->
                            </div>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                            <a href="authentication/layouts/corporate/sign-in.html" class="menu-link px-5">Sign Out</a>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::User account menu-->
                    <!--end::Menu wrapper-->
                </div>
                <!--end::User menu-->
            </div>
            <!--end::Navbar-->
        </div>
        <!--end::Header primary-->
    </div>
    <!--end::Header container-->
</div>
