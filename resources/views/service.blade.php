<section class="services-wrap service-two section-padding pt-0" id="service">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 col-12 offset-lg-2 offset-md-1">
                        <div class="section-title text-center">
                            <span></span>
                            <h2>Know About What we are giving to our customers.</h2>
                            <p>Let's Understand about our software features. There are some features description giving below.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($service as $kk=>$vv)
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="service-box-2" data-aos="fade-up" data-aos-duration="1000">
                                <div class="service-icon">
                                    <img src="{{asset('storage/image/service/'.$vv->logo)}}" alt="" />
                                </div>
                                <h4>{{ucwords($vv->heading)}}</h4>
                                <p>{{ucwords($vv->description)}}.</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>