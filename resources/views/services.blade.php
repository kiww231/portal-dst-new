@extends('layouts.master')

@section('content')
<section class="page-header">
    <div class="page-header-bg" style="background-image: url({{asset('storage/banner/'.@$services_attribute->banner)}})">
    </div>
    <div class="page-header-bg-overly"></div>
    <!-- <div class="page-header-shape wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms"
        style="background-image: url(assets/images/shapes/page-header-shape.png)"></div> -->
    <div class="container">
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="{{url('/')}}">Home</a></li>
                <li><span>/</span></li>
                <li>Services</li>
            </ul>
            <h2>Services</h2>
        </div>
    </div>
</section>
<!--Page Header End-->

<!--Services Two Start-->
<section class="services-two">
    <div class="container">
        <div class="row">
            @foreach(@$services as $val_serv)
            <div class="col-xl-4 col-lg-4 wow fadeInLeft" data-wow-delay="100ms">
                <!--Services One Single-->
                <div class="services-one__single">
                    <div class="services-one__icon">
                        <span class="icon-conversation"></span>
                    </div>
                    <h3 class="services-one__title">
                        <a href="{{url('services/'.$val_serv->slug)}}">{{$val_serv->title}}</a>
                    </h3>
                    <p class="services-one__text">
                        {{substr(@$val_serv->short_description, 0, 50) .((strlen(@$val_serv->short_description) > 50) ? '...' : '')}}
                    </p>
                    <div class="services-one__arrow">
                        <a href="{{url('services/'.$val_serv->slug)}}"><span class="icon-right-arrow"></span></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--Services Two End-->

<!--Video One Start-->
@if($services_attribute->video_is_active == 1)
<section class="video-one">
    <div class="video-one-bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
        style="background-image: url({{asset('storage/services/'.@$services_attribute->video_thumbnail)}})"></div>
    <div class="video-one-bg-overly"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="video-one__inner">
                    <div class="video-one__video-link">
                        <a href="{{ @$services_attribute->video_url }}" class="video-popup">
                            <div class="video-one__video-icon">
                                <span class="icon-play-button"></span>
                                <i class="ripple"></i>
                            </div>
                        </a>
                    </div>
                    <h2 class="video-one__title">Trusted By The World's Best <br> Organizations</h2>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!--Video One End-->

<!--Help Start-->
@if($services_attribute->help_is_active == 1 AND count(@$services_help) > 2)
<section class="help">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <ul class="help__box list-unstyled clearfix">
                    <li class="help__single help__box-one wow fadeInLeft" data-wow-delay="100ms">
                        <div class="help__box-one-content">
                            <h3 class="help__box-one-title">{{@$services_attribute->help_title}}</h3>
                        </div>
                        <div class="help__box-one-img">
                            <img src="{{asset('storage/services/'.$services_attribute->help_image)}}" alt="">
                        </div>
                    </li>
                    @foreach(@$services_help as $val_help)
                    <li class="help__single help__box-two wow fadeInLeft" data-wow-delay="300ms">
                        <div class="help__box-two-content">
                            <div class="help__box-two-icon">
                                <span class="icon-learning"></span>
                            </div>
                            <h3 class="help__box-two-title"><a href="managed-it.html">{{@$val_help->title}}</a></h3>
                            <p class="help__box-two-text">{{substr(@$val_help->short_description, 0, 30) .((strlen(@$val_help->short_description) > 30) ? '...' : '')}}</p>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
@else
    <section style="margin-bottom: 120px;"></section>
@endif
<!--Help End-->

<!--Business Growth Start-->
@if($services_attribute->business_is_active == 1)
<section class="business-growth business-growth-two">
    <div class="business-growth__top">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="business-growth__left">
                        <div class="section-title text-left">
                            <span class="section-title__tagline">{{@$services_attribute->business_tagline}}</span>
                            <h2 class="section-title__title">{!!@$services_attribute->business_title!!}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="business-growth__right">
                        <p class="business-growth__right-text">{{@$services_attribute->business_desc}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="business-growth__bottom">
            <div class="row">
                <div class="col-xl-4 col-lg-4 wow fadeInLeft" data-wow-delay="100ms">
                    <!--Business Growth Single-->
                    <div class="business-growth__single">
                        <div class="business-growth__img">
                            <img src="assets/images/resources/business-growth-img-1.jpg" alt="">
                        </div>
                        <div class="business-growth__content">
                            <h4 class="business-growth__title">
                                <a href="managed-it.html">Perfect Solution that your Business Demands</a>
                            </h4>
                            <p class="business-growth__text">Lorem ipsum dolor amet, consectetur notted adip
                                sicing elit text.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="200ms">
                    <!--Business Growth Single-->
                    <div class="business-growth__single">
                        <div class="business-growth__img">
                            <img src="assets/images/resources/business-growth-img-2.jpg" alt="">
                        </div>
                        <div class="business-growth__content">
                            <h4 class="business-growth__title">
                                <a href="contact.html">Perfect Solution that your Business Demands</a>
                            </h4>
                            <p class="business-growth__text">Lorem ipsum dolor amet, consectetur notted adip
                                sicing elit text.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 wow fadeInRight" data-wow-delay="300ms">
                    <!--Business Growth Single-->
                    <div class="business-growth__single">
                        <div class="business-growth__img">
                            <img src="assets/images/resources/business-growth-img-3.jpg" alt="">
                        </div>
                        <div class="business-growth__content">
                            <h4 class="business-growth__title">
                                <a href="about.html">Perfect Solution that your Business Demands</a>
                            </h4>
                            <p class="business-growth__text">Lorem ipsum dolor amet, consectetur notted adip
                                sicing elit text.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="business-growth__find">
            <div class="row">
                <div class="col-lg-12">
                    <div class="business-growth__find-inner">
                        <p>IT services built specifically for your business. <a href="contact.html">Find Your
                                Solution</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@endsection