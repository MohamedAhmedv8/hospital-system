<div class="nav-outer clearfix">
    <!--Mobile Navigation Toggler For Mobile--><div class="mobile-nav-toggler"><span class="icon flaticon-menu"></span></div>
    <nav class="main-menu navbar-expand-md navbar-light">
        <div class="navbar-header">
            <!-- Togg le Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon flaticon-menu"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse clearfix" id="navbarSupportedContent">
            <ul class="navigation clearfix">
                <li class="current dropdown"><a href="#">{{ trans('WebSite/nav-bar_trans.home') }}</a>
                    <ul>
                        <li><a href="index.html">Home page 01</a></li>
                        <li><a href="index-2.html">Home page 02</a></li>
                        <li><a href="index-3.html">Home page 03</a></li>
                        <li><a href="index-4.html">Home page 04</a></li>
                        <li class="dropdown"><a href="#">Header Styles</a>
                            <ul>
                                <li><a href="index.html">Header Style One</a></li>
                                <li><a href="index-2.html">Header Style Two</a></li>
                                <li><a href="index-3.html">Header Style Three</a></li>
                                <li><a href="index-4.html">Header Style Four</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#">{{ trans('WebSite/nav-bar_trans.about_us') }}</a>
                    <ul>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="team.html">Our Team</a></li>
                        <li><a href="faq.html">Faq</a></li>
                        <li><a href="services.html">Services</a></li>
                        <li><a href="gallery.html">Gallery</a></li>
                        <li><a href="comming-soon.html">Comming Soon</a></li>
                    </ul>
                </li>
                <li class="dropdown has-mega-menu"><a href="#">{{ trans('WebSite/nav-bar_trans.pages') }}</a>
                    <div class="mega-menu">
                        <div class="mega-menu-bar row clearfix">
                            <div class="column col-md-3 col-xs-12">
                                <h3>About Us</h3>
                                <ul>
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="team.html">Our Team</a></li>
                                    <li><a href="faq.html">Faq</a></li>
                                    <li><a href="services.html">Services</a></li>
                                </ul>
                            </div>
                            <div class="column col-md-3 col-xs-12">
                                <h3>Doctors</h3>
                                <ul>
                                    <li><a href="doctors.html">Doctors</a></li>
                                </ul>
                            </div>
                            <div class="column col-md-3 col-xs-12">
                                <h3>Blog</h3>
                                <ul>
                                    <li><a href="blog.html">Our Blog</a></li>
                                    <li><a href="blog-classic.html">Blog Classic</a></li>
                                    <li><a href="blog-detail.html">Blog Detail</a></li>
                                </ul>
                            </div>
                            <div class="column col-md-3 col-xs-12">
                                <h3>Shops</h3>
                                <ul>
                                    <li><a href="shop.html">Shop</a></li>
                                    <li><a href="shop-single.html">Shop Details</a></li>
                                    <li><a href="shoping-cart.html">Cart Page</a></li>
                                    <li><a href="checkout.html">Checkout Page</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="dropdown"><a href="#">{{ trans('WebSite/nav-bar_trans.doctors') }}</a>
                    <ul>
                        <li><a href="doctors.html">Doctors</a></li>
                        <li><a href="doctors-detail.html">Doctors Detail</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#">{{ trans('WebSite/nav-bar_trans.sections') }}</a>
                    <ul>
                        <li><a href="department.html">Department</a></li>
                        <li><a href="department-detail.html">Department Detail</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#">{{ trans('WebSite/nav-bar_trans.articles') }}</a>
                    <ul>
                        <li><a href="blog.html">Our Blog</a></li>
                        <li><a href="blog-classic.html">Blog Classic</a></li>
                        <li><a href="blog-detail.html">Blog Detail</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#">{{ trans('WebSite/nav-bar_trans.store') }}</a>
                    <ul>
                        <li><a href="shop.html">Shop</a></li>
                        <li><a href="shop-single.html">Shop Details</a></li>
                        <li><a href="shoping-cart.html">Cart Page</a></li>
                        <li><a href="checkout.html">Checkout Page</a></li>
                    </ul>
                </li>
                <li><a href="contact.html">{{ trans('WebSite/nav-bar_trans.contact_us') }}</a></li>
                <li class="dropdown"><a href="#">{{ LaravelLocalization::getCurrentLocaleNative() }}</a>
                    <ul>
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li>
                                <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                @if( Auth::guard('admin','doctor','ray_employee','laboratory_employee','patient')->check())
                <li><a href="{{route('dashboard.patient')}}">{{ trans('WebSite/nav-bar_trans.dashboard') }}</a></li>
                @else
                <li><a href="{{route('login')}}">{{ trans('WebSite/nav-bar_trans.login') }}</a></li>
                @endif
            </ul>
        </div>
    </nav>
    <div class="outer-box clearfix">
        <!-- Main Menu End-->
        <div class="nav-box">
            <div class="nav-btn nav-toggler navSidebar-button"><span class="icon flaticon-menu-1"></span></div>
        </div>
        <!-- Social Box -->
        <ul class="social-box clearfix">
            <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
            <li><a href="#"><span class="fab fa-twitter"></span></a></li>
            <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
            </li>
        </ul>
        <!-- Search Btn -->
        <div class="search-box-btn"><span class="icon flaticon-search"></span></div>
    </div>
</div>