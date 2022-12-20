<section class="hero-slider-wrap hero-slider-active">
    @foreach($slider as $k=>$v)

        <div class="single-slide">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-10 col-12 pr-0">
                        <div class="single-slide-content slide1 text-white">
                            <span>{{ucwords($v->small_hdg)}}</span>
                            <h1>{{ucwords($v->heading)}}.</h1>
                            <p>{{ucwords($v->small_desc)}}</p>
                            <a href="{{$v->link}}" class="theme-btn">{{ucwords($v->link_hdg)}}</a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 d-none d-lg-block col-12">
                        <div class="single-slide-img">
                            <img src="{{asset('storage/image/slider/'.$v->slider)}}" alt="Sliders" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endforeach
    
</section>