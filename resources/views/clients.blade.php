<section class="testimonail-wrap section-padding" id="testimonial">
            <div class="testimonial-bg" data-background="assets/img/bgshape.svg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 col-12 offset-lg-2 offset-md-1">
                        <div class="section-title text-center text-white">
                            <span></span>
                            <h2>Happy testimonials</h2>
                            <p>Kind words from our valuable customers</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="testimonial-list">
                            @foreach($client as $c=>$cc)
                                <div class="single-testimonial">
                                    <div class="client-img">
                                        <img src="{{asset('storage/image/client/'.$cc->logo)}}" alt="" />
                                    </div>
                                    <div class="client-info">
                                        <h4>{{ucfirst($cc->name)}}</h4>
                                        <p>{{ucwords($cc->designation)}}</span></p>
                                    </div>
                                    <p>
                                        {{ucwords(urldecode($cc->description))}}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>