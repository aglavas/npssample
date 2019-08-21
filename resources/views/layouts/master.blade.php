<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<title>{{ env('APP_NAME') }}</title>
		@include('layouts.header')

		<link rel="stylesheet" type="text/css" href="{{ asset('metronic/vendors/custom/datatables/datatables.bundle.css') }}">
		<link rel="stylesheet" type="text/css" href="https://amcharts.com/lib/3/plugins/export/export.css">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/css/bootstrap-material-datetimepicker.css">

		<script defer src="{{ asset('metronic/vendors/custom/datatables/datatables.bundle.js') }}"></script>
        <script defer src="{{ asset('js/app.js') }}"></script>
        {{--<script defer src="{{ asset('js/main-react.js') }}"></script>--}}
		<script defer src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
		<script defer src="https://amcharts.com/lib/3/amcharts.js"></script>
		<script defer src="https://amcharts.com/lib/3/serial.js"></script>
		<script defer src="https://amcharts.com/lib/3/plugins/animate/animate.min.js"></script>
		<script defer src="https://amcharts.com/lib/3/plugins/export/export.min.js"></script>
		<script defer src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/js/bootstrap-material-datetimepicker.js"></script>
	</head>
	{{--<body id="mainBody" onload="mainInit();" onbeforeunload="blockPage();" class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">--}}
	{{--<body id="mainBody" class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">--}}
	<body id="mainBody" class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default m-brand--minimize m-aside-left--minimize">
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<header id="m_header" class="m-grid__item m-header" m-minimize-offset="200" m-minimize-mobile-offset="200">
				<div class="m-container m-container--fluid m-container--full-height">
					<div class="m-stack m-stack--ver m-stack--desktop">
                        @if(Route::current()->getName() != 'get.answer')
						<div class="m-stack__item m-brand  m-brand--skin-dark">
							<div class="m-stack m-stack--ver m-stack--general">
								<div class="m-stack__item m-stack__item--middle m-brand__logo">
									{{--<a href="{{ route('home') }}" class="m-brand__logo-wrapper">--}}
										{{--<img data-src="{{ asset('img/logo.png') }}" alt="Logo" width="150" class="lazy-load">--}}
									{{--</a>--}}
								</div>
                                    <div class="m-stack__item m-stack__item--middle m-brand__tools">
                                        <!-- BEGIN: Left Aside Minimize Toggle -->
                                        <a href="#" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block hide
                         ">
                                            <span></span>
                                        </a>
                                        <!-- END -->
                                        <!-- BEGIN: Responsive Aside Left Menu Toggler -->
                                        <a href="#" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
                                            <span></span>
                                        </a>
                                        <!-- END -->
                                        <!-- BEGIN: Topbar Toggler -->
                                        <a id="m_aside_header_topbar_mobile_toggle" href="#" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                                            <i class="flaticon-more"></i>
                                        </a>
                                        <!-- BEGIN: Topbar Toggler -->
                                    </div>
							</div>
						</div>
                        @endif

                        @if(Route::current()->getName() != 'get.answer')
                            <nav class="navbar navbar-default navbar-fixed-top navbar--small">
                                <div class="container">
                                    {{ Breadcrumbs::render() }}
                                </div>
                            </nav>
                        @endif

                        {{--<div class="row">--}}
                            {{--<div class="col-lg-6">--}}
                                {{--{{ Breadcrumbs::render('dashboard') }}--}}
                            {{--</div>--}}
                            {{--<div class="col-lg-6">--}}
                                {{--<div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
                                    {{--<ul class="navbar-nav mr-auto">--}}
                                        {{--<li class="nav-item dropdown">--}}
                                            {{--<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                                {{--Dropdown--}}
                                            {{--</a>--}}
                                            {{--<div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
                                                {{--<a class="dropdown-item" href="#">Action</a>--}}
                                                {{--<a class="dropdown-item" href="#">Another action</a>--}}
                                                {{--<div class="dropdown-divider"></div>--}}
                                                {{--<a class="dropdown-item" href="#">Something else here</a>--}}
                                            {{--</div>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

						<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
							<div id="m_header_topbar" class="m-topbar m-stack m-stack--ver m-stack--general m-stack--fluid">
                                <div class="row">
                                    <div class="col-md-4 col-lg-6">
                                        {{--<ul class="nav navbar-nav">--}}
                                            {{--<li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown active">--}}
                                                {{--<a href="javascript:;"> Layouts--}}
                                                    {{--<span class="arrow"></span>--}}
                                                {{--</a>--}}
                                                {{--<ul class="dropdown-menu pull-left">--}}
                                                    {{--<li aria-haspopup="true" class=" ">--}}
                                                        {{--<a href="layout_mega_menu_light.html" class="nav-link  "> Light Mega Menu </a>--}}
                                                    {{--</li>--}}
                                                    {{--<li aria-haspopup="true" class=" active">--}}
                                                        {{--<a href="layout_top_bar_light.html" class="nav-link  active"> Light Top Bar Dropdowns </a>--}}
                                                    {{--</li>--}}
                                                    {{--<li aria-haspopup="true" class=" ">--}}
                                                        {{--<a href="layout_fluid_page.html" class="nav-link  "> Fluid Page </a>--}}
                                                    {{--</li>--}}
                                                    {{--<li aria-haspopup="true" class=" ">--}}
                                                        {{--<a href="layout_top_bar_fixed.html" class="nav-link  "> Fixed Top Bar </a>--}}
                                                    {{--</li>--}}
                                                    {{--<li aria-haspopup="true" class=" ">--}}
                                                        {{--<a href="layout_mega_menu_fixed.html" class="nav-link  "> Fixed Mega Menu </a>--}}
                                                    {{--</li>--}}
                                                    {{--<li aria-haspopup="true" class=" ">--}}
                                                        {{--<a href="layout_disabled_menu.html" class="nav-link  "> Disabled Menu Links </a>--}}
                                                    {{--</li>--}}
                                                    {{--<li aria-haspopup="true" class=" ">--}}
                                                        {{--<a href="layout_blank_page.html" class="nav-link  "> Blank Page </a>--}}
                                                    {{--</li>--}}
                                                {{--</ul>--}}
                                            {{--</li>--}}
                                        {{--</ul>--}}

                                        @if(Route::current()->getName() == 'dashboard')
                                            <nav class="navbar navbar-expand navbar-light bg-light">
                                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                                    <ul class="navbar-nav mr-auto">
                                                        <li class="nav-item dropdown">
                                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" data-target=".navbar-expand" aria-haspopup="true">
                                                                Countries
                                                            </a>
                                                            <nav class="collapse navbar-collapse" role="navigation">
                                                                <div class="dropdown-menu navbar-expand flex-column" id="langDropdown" aria-labelledby="navbarDropdown">
                                                                    <a class="dropdown-item" href="/">All</a>
                                                                    @foreach (App\Services\LanguageConfig::get() as $language)
                                                                        <a class="dropdown-item" href="/?locale={{$language->locale}}">{{$language->country}}</a>
                                                                    @endforeach
                                                                </div>
                                                            </nav>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </nav>
                                        @endif
                                    </div>
                                    <div class="col-md-4 breadcrumb-container-sm">
                                        <div>
                                            {{ Breadcrumbs::render() }}
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-lg-6">
                                        <div class="m-stack__item m-topbar__nav-wrapper">

                                            <ul class="m-topbar__nav m-nav m-nav--inline">

                                                <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
                                                    <a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-topbar__userpic">
                                                    @if(\Illuminate\Support\Facades\Auth::user() != null && (Route::current()->getName() != 'get.answer'))
                                                        @include('layouts.profile_area')
                                                    @endif
												</span>
                                                        @if(\Illuminate\Support\Facades\Auth::user() != null && (Route::current()->getName() != 'get.answer'))
                                                            <span class="m-topbar__username m--hide">{{ Auth::user()->name }}</span>
                                                        @endif
                                                    </a>
                                                    <div class="m-dropdown__wrapper">
                                                        <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                                        <div class="m-dropdown__inner">
                                                            <div class="m-dropdown__header m--align-center" style="background: url('{{ asset('img/misc/user_profile_bg.jpg') }}'); background-size: cover;">
                                                                <div class="m-card-user m-card-user--skin-dark">
                                                                    <div class="m-card-user__pic">
                                                                        @if(\Illuminate\Support\Facades\Auth::user() != null)
                                                                            @include('layouts.profile_area')
                                                                        @endif
                                                                    </div>
                                                                    @if(\Illuminate\Support\Facades\Auth::user() != null)
                                                                        <div class="m-card-user__details">
                                                                            <span class="m-card-user__name m--font-weight-500">{{ Auth::user()->name }}</span>
                                                                            <a href="mailto:{{ Auth::user()->email }}" class="m-card-user__email m--font-weight-300 m-link">{{ Auth::user()->email }}</a>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="m-dropdown__body">
                                                                <div class="m-dropdown__content">
                                                                    <ul class="m-nav m-nav--skin-light">
                                                                        <li class="m-nav__item">
                                                                            {{--<a href="{{ $user->profile() }}" class="m-nav__link">--}}
                                                                            <a href="" class="m-nav__link">
                                                                                <i class="m-nav__link-icon fa fa-user-edit"></i>
                                                                                <span class="m-nav__link-title">
																			<span class="m-nav__link-wrap">
																				<span class="m-nav__link-text">Profile</span>
																			</span>
																		</span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="m-nav__item">
                                                                            <a href="{{ route('logout') }}" class="m-nav__link">
                                                                                <i class="m-nav__link-icon fa fa-sign-out-alt"></i>
                                                                                <span class="m-nav__link-title">
																			<span class="m-nav__link-wrap">
																				<span class="m-nav__link-text">Logout</span>
																			</span>
																		</span>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
							</div>
						</div>
					</div>
				</div>
			</header>

                <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
                    <button type="button" class="m-aside-left-close m-aside-left-close--skin-dark" id="m_aside_left_close_btn">
                        <i class="la la-close"></i>
                    </button>

                    @if(Route::current()->getName() != 'get.answer')
                        <div id="m_aside_left" class="m-grid__item m-aside-left m-aside-left--skin-dark">
                            <!-- Side Content -->
                            <div
                                id="m_ver_menu"
                                class="m-aside-menu m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark"
                                m-menu-vertical="1"
                                m-menu-scrollable="1"
                                m-menu-dropdown-timeout="500"
                                style="position: relative;">
                                    @include('layouts.navigation')
                            </div>
                            <!-- END Side Content -->
                        </div>
                    @endif

                    <div class="m-grid__item m-grid__item--fluid m-wrapper">
                        <div class="m-content">
                            <div class="m-portlet m-portlet--bordered m-portlet--rounded m-portlet--responsive-mobile" id="main_portlet">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>

			<footer class="m-grid__item	m-footer">
				<div class="m-container m-container--fluid m-container--full-height m-page__container">
					<div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
						<div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
							<span class="m-footer__copyright">

							</span>
						</div>
						<?php

						if(count($errors))
						{
							?>
							<div class="m-stack__item m-stack__item--right m-stack__item--middle m-stack__item--first">
								<ul class="m-footer__nav m-nav m-nav--inline m--pull-right">
									<li class="m-nav__item">
										<a href="javascript:displayErrors('error-messages');" title="{{ __('global.errors') }}" class="m-nav__link" data-container="body" data-toggle="m-tooltip" data-placement="top">
											<span class="m-badge m-badge--danger m-badge--wide">
												<i class="fa fa-exclamation-triangle"></i> {{ count($errors) }}
											</span>
										</a>
									</li>
								</ul>
							</div>
							<?php
						}

						?>
					</div>
				</div>
			</footer>
		</div>

		<div id="m_scroll_top" class="m-scroll-top" title="{{ __('global.back-to-top') }}" data-container="body" data-toggle="m-tooltip" data-placement="top">
			<i class="la la-arrow-up"></i>
		</div>

		{{--<span id="error-messages" hidden>{{ json_encode($errors->all()) }}</span>--}}

		{{--<form id="logout-form" action="{{ route('logout') }}" method="post" hidden>--}}
			{{--@csrf--}}
		{{--</form>--}}
	</body>
<script type="text/javascript">
        $(document).ready(function(){
            $('#navbarDropdown').click( function(e) {e.preventDefault();

                $('#langDropdown').toggle(function() {
                    $(this).toggleClass("navbar-expand navbar-collapse");;
                }, function() {
                    $(this).toggleClass("navbar-collapse navbar-expand");;
                });

            return false; } );

            // $('#changeMode').button().click(function(){
            //     $('#playfield').toggle(function() {
            //         $(this).toggleClass("gridView plainView");
            //         //$(this).removeClass("gridView").addClass("plainView");
            //     }, function() {
            //         $(this).toggleClass("plainView gridView");
            //         //$(this).removeClass("plainView").addClass("gridView");
            //     });
            // });
        });
</script>
</html>
