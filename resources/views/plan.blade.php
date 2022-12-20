<section class="price-wrap price-two section-padding" id="price">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 col-12 offset-lg-2 offset-md-1">
                        <div class="section-title text-center text-white">
                            <span></span>
                            <h2>Choose the best plan, According to your need.</h2>
                            <p>if you looking for your own system and don't want to waste your time , Take Our complete system on rent with monthly/Yearly payments</p>
                        </div>
                    </div>
                </div>
                <div class="row mt-40">
                    @foreach($plan as $p=>$r)
                        <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                            <div class="single-price-box">
                                <div class="package-name text-center">
                                    <h3>{{ucfirst($r->plan)}}</h3>
                                    <span>{{ucfirst($r->heading)}}</span>
                                </div>
                                <div class="package-features-price">
                                    <div class="price text-center">
                                        <span>{{$r->rate}}.00</span>
                                    </div>
                                    <ul>
                                    @php
                                        $feature =App\Http\Controllers\front\FrontController::getlist($r->plan);
                                    @endphp
                                        @foreach($feature as $f=>$ff)
                                         <li><i class="fal fa-check-circle"></i>{{$ff->feature_list}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="package-btn">
                                    <a href="https://api.whatsapp.com/send?phone={{$info->Whatapp}}&text={{urlencode('I Need '.$r->plan)}}.">try now</a>
                                    
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                </div>
            </div>
        </section>