
        <footer class="footer-wrap footer-two pb-80">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="site-info-widget single-footer-wid">
                                <div class="footer-logo">
                                    <a href="{{URL::to('/')}}"><img src="{{asset('storage/image/Logo/'.$info->logo)}}" alt="CompanyLogo" /></a>
                                    <p>
                                        {{$info->Description}}
                                    </p>
                                </div>
                                <div class="social-pages">
                                    <a href="{{$info->Facebook}}"><i class="fab fa-facebook-f"></i></a>
                                    <a href="{{$info->Twitter}}"><i class="fab fa-twitter"></i></a>
                                    <a href="{{$info->linkedin}}"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="single-footer-wid">
                                <div class="foo-wid-title">
                                    <h3>Services</h3>
                                </div>
                                <ul>
                                    <li><a href="#">Web Designing</a></li>
                                    <li><a href="#">Web Development</a></li>
                                    <li><a href="#">Android/IOS App</a></li>
                                    <li><a href="#">Domain & Hosting</a></li>
                                    <li><a href="#">SMS Gateway</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="single-footer-wid">
                                <div class="foo-wid-title">
                                    <h3>Language</h3>
                                </div>
                                <ul>
                                    <li><a href="#">Html,Css,Bootstrap,React js,jv</a></li>
                                    <li><a href="#">Laravel</a></li>
                                    <li><a href="#">PHP</a></li>
                                    <li><a href="#">Ajax</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="single-footer-wid">
                                <div class="foo-wid-title">
                                    <h3>Contact Us</h3>
                                </div>
                                <ul>
                                    <li><a href="mailto:{{$info->Email}}">Mail us {{$info->Email}}</a></li>
                                    <li><a href="tel:{{$info->Mobile}}">Contact {{$info->Mobile}}</a></li>
                                    <li><a href="#">Address {{$info->Address}}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom mt-80">
                <div class="container">
                    <div class="row align-items-end">
                        <div class="col-md-6 col-12">
                            <div class="copyright-info">
                                <span>Copyright &copy; 2020. All Rights Reserved.</span>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 text-md-right">
                            <div class="payment-support">
                                <ul>
                                    <li><i class="fab fa-cc-paypal"></i></li>
                                    <li><i class="fab fa-cc-stripe"></i></li>
                                    <li><i class="fab fa-cc-mastercard"></i></li>
                                    <li><i class="fab fa-cc-jcb"></i></li>
                                    <li><i class="fab fa-cc-amazon-pay"></i></li>
                                    <li><i class="fab fa-cc-amex"></i></li>
                                    <li><i class="fas fa-credit-card-front"></i></li>
                                    <li><i class="fab fa-cc-visa"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>