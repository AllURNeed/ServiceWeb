<section class="faq-wrap section-padding" id="faq">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 col-12 offset-lg-2 offset-md-1">
                        <div class="section-title text-center">
                            <span></span>
                            <h2>Frequently asked questions</h2>
                            <p>WHO? HOW? WHY? To get answers for more questions, visit our <span>documentation</span> or <span>contact us page</span>.</p>
                        </div>
                    </div>
                </div>
                <div class="row pt-10">
                    @foreach($faq as $q=>$ans)
                        <div class="col-12">
                            <div class="single-faq-box" data-aos="fade-up" date-aos-delay="50" data-aos-duration="900">
                                <div class="faq-icon">
                                    <img src="{{asset('storage/image/faq/'.$ans->logo)}}" alt="" />
                                </div>
                                <div class="faq-text">
                                    <h4>{{ucwords(urldecode($ans->question))}}</h4>
                                    <p>{{ucfirst(urldecode($ans->answere))}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>