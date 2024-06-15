<footer class="main-footer style-two">
    <div class="auto-container">
        <!--Widgets Section-->
        <div class="widgets-section">
            <div class="row clearfix">
                <!--big column-->
                <div class="big-column col-lg-6 col-md-12 col-sm-12">
                    <div class="row clearfix">
                        <!--Footer Column-->
                        <div class="footer-column col-lg-7 col-md-6 col-sm-12">
                            <div class="footer-widget logo-widget">
                                <div class="logo">
                                    <a href="index.html"><img src="images/logo-3.png" alt=""/></a>
                                </div>
                                <ul class="social-icons">
                                    <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                    <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                    <li><a href="#"><span class="fab fa-linkedin"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <!--Footer Column-->
                        <div class="footer-column col-lg-5 col-md-6 col-sm-12">
                            <div class="footer-widget links-widget">
                                <div class="footer-title  clearfix">
                                    <h2>{{ trans('WebSite/footer_trans.sections') }}</h2>
                                    <div class="separator"></div>
                                </div>
                                <ul class="footer-list">
                                    <li><a href="#">{{ trans('WebSite/footer_trans.surgery') }}</a></li>
                                    <li><a href="#">{{ trans('WebSite/footer_trans.internal') }}</a></li>
                                    <li><a href="#">{{ trans('WebSite/footer_trans.obstetrics_and_gynecology') }}</a></li>
                                    <li><a href="#">{{ trans('WebSite/footer_trans.eyes') }}</a></li>
                                    <li><a href="#"{{ trans('WebSite/footer_trans.pediatrics') }}></a></li>
                                    <li><a href="#">{{ trans('WebSite/footer_trans.dermatology') }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--big column-->
                <div class="big-column col-lg-6 col-md-12 col-sm-12">
                    <div class="row clearfix">
                        <!--Footer Column-->
                        <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-widget news-widget">
                                <div class="footer-title  clearfix">
                                    <h2>{{ trans('WebSite/footer_trans.news_update') }}</h2>
                                    <div class="separator"></div>
                                </div>
                                <!--News Widget Block-->
                                <div class="news-widget-block">
                                    <div class="widget-inner">
                                        <div class="image">
                                            <img src="images/resource/news-image-1.jpg" alt=""/>
                                        </div>
                                        <h3><a href="blog-detail.html">{{ trans('WebSite/footer_trans.integrative_medicine_for_cancer_treatment') }}</a>
                                        </h3>
                                        <div class="post-date">11 يوليو 2022</div>
                                    </div>
                                </div>

                                <!--News Widget Block-->
                                <div class="news-widget-block">
                                    <div class="widget-inner">
                                        <div class="image">
                                            <img src="images/resource/news-image-2.jpg" alt=""/>
                                        </div>
                                        <h3><a href="blog-detail.html">{{ trans('WebSite/footer_trans.better_health_care_for_one_patient') }}</a></h3>
                                        <div class="post-date">11 يوليو 2022</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Footer Column-->
                        <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-widget contact-widget">
                                <div class="footer-title  clearfix">
                                    <h2>{{ trans('WebSite/footer_trans.connect_us') }}</h2>
                                    <div class="separator"></div>
                                </div>
                                <ul class="contact-list">
                                    {{-- <li><span class="icon flaticon-placeholder"></span><br></li> --}}
                                    <li><span class="icon flaticon-call"></span>{{ trans('WebSite/footer_trans.phone_number') }}<br> <a href="tel:+16197223281">+16197223281</a></li>
                                    <li><span class="icon flaticon-message"></span><a href="hospital-m@gmail.com">hospital@gmail.com</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="auto-container">
            <div class="copyright">Hospital-M &copy; All Rights Reserved By MVR</div>
        </div>
    </div>
</footer>