<section class="out-tem-wrap section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 col-12 offset-lg-2 offset-md-1">
                        <div class="section-title text-center">
                            <span></span>
                            <h2>INNOVATIVE TEAM</h2>
                            <p>Meet Our Awesome And Expert Team Members</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($team as $t=>$tt)
                        <div class="col-md-6 col-xl-3 col-sm-12 col-12">
                            <div class="single-team-member text-center">
                                <div class="member">
                                    <div class="member-img">
                                        <img src="{{asset('storage/image/team/'.$tt->image)}}" alt="" />
                                    </div>
                                    <div class="member-info">
                                        <h4>{{ucfirst($tt->name)}}</h4>
                                        <span>{{ucfirst($tt->designation)}}</span>
                                    </div>
                                </div>
                                <div class="social-profile-links">
                                    <a href="{{ucfirst($tt->fb)}}"><i class="fab fa-facebook-f"></i></a>
                                    <a href="{{ucfirst($tt->tw)}}"><i class="fab fa-twitter"></i></a>
                                    <a href="{{ucfirst($tt->ln)}}"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>