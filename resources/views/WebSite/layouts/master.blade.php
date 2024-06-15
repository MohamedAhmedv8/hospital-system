<!DOCTYPE html>
<html lang="en">
<head>
@include('WebSite.layouts.header')
</head>
<body>
<div class="page-wrapper {{ LaravelLocalization::getCurrentLocale() ==='ar' ? 'rtl': ''}}">
    <!-- Preloader -->
    <div class="preloader"></div>
    <header class="main-header header-style-three">
		<!-- Header Upper -->
        <div class="header-upper">
            <div class="inner-container clearfix">
				<!--Info-->
				<div class="logo-outer">
					<div class="logo"><a href="index.html"><img src="images/logo-3.png" alt="" title=""></a></div>
				</div>
				<!--Nav Box-->
				@include('WebSite.layouts.nav-bar')
            </div>
        </div>
        <!--End Header Upper-->
		<!--Sticky Header-->
        <div class="sticky-header">
			<div class="auto-container clearfix">
				<!--Logo-->
				<div class="logo pull-left">
					<a href="index.html" class="img-responsive"><img src="images/logo-small.png" alt="" title=""></a>
                </div>
				<!--Right Col-->
                <div class="right-col pull-right">
					<!-- Main Menu -->
                    <nav class="main-menu navbar-expand-md">
                        <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent1">
                            <ul class="navigation clearfix"><!--Keep This Empty / Menu will come through Javascript--></ul>
                        </div>
                    </nav><!-- Main Menu End-->
                </div>
            </div>
        </div>
        <!--End Sticky Header-->
									<!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><span class="icon far fa-window-close"></span></div>
            <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
            <nav class="menu-box">
				<div class="nav-logo"><a href="index.html"><img src="images/nav-logo.png" alt="" title=""></a></div>
                <ul class="navigation clearfix"><!--Keep This Empty / Menu will come through Javascript--></ul>
            </nav>
        </div><!-- End Mobile Menu -->
    </header>
    <!-- End Main Header -->
@yield('content')

	<!--Main Footer-->
@include('WebSite.layouts.footer')
</div>
<!--End pagewrapper-->
<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>
<!--Search Popup-->
<div id="search-popup" class="search-popup">
	<div class="close-search theme-btn"><span class="fas fa-window-close"></span></div>
	<div class="popup-inner">
		<div class="overlay-layer"></div>
		<div class="search-form">
			<form method="post" action="index.html">
				<div class="form-group">
					<fieldset>
                        <input type="search" class="form-control" name="search-input" value="" placeholder="{{ trans('WebSite/master_trans.search_here') }}" required >
                        <input type="submit" value="{{ trans('WebSite/master_trans.search_now') }}" class="theme-btn">
                    </fieldset>
                </div>
            </form>
            <br>
            <h3>{{ trans('WebSite/master_trans.search') }}</h3>
            <ul class="recent-searches">
                <li><a href="#">Web Development</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- sidebar cart item -->
@include('WebSite.layouts.side-bar')
<!-- END sidebar widget item -->
<!-- Color Palate / Color Switcher -->
<div class="color-palate">
    <div class="color-trigger">
        <i class="fas fa-cog"></i>
    </div>
    <div class="color-palate-head">
        <h6>Choose Your Color</h6>
    </div>
    <div class="various-color clearfix">
        <div class="colors-list">
            <span class="palate default-color active" data-theme-file="css/color-themes/default-theme.css"></span>
            <span class="palate green-color" data-theme-file="css/color-themes/green-theme.css"></span>
            <span class="palate olive-color" data-theme-file="css/color-themes/olive-theme.css"></span>
            <span class="palate orange-color" data-theme-file="css/color-themes/orange-theme.css"></span>
            <span class="palate purple-color" data-theme-file="css/color-themes/purple-theme.css"></span>
            <span class="palate teal-color" data-theme-file="css/color-themes/teal-theme.css"></span>
            <span class="palate brown-color" data-theme-file="css/color-themes/brown-theme.css"></span>
            <span class="palate redd-color" data-theme-file="css/color-themes/redd-color.css"></span>
        </div>
    </div>
	<ul class="rtl-version option-box"> <li class="rtl">RTL Version</li> <li>LTR Version</li> </ul>
    <a href="#" class="purchase-btn">Purchase now $17</a>
    <div class="palate-foo">
        <span>You will find much more options for colors and styling in admin panel. This color picker is used only for demonstation purposes.</span>
    </div>
</div>
<!--Scroll to top-->
@include('WebSite.layouts.footer-scripts')
</body>
</html>
