@extends('layouts.master')

@section('content')
    <section class="main-slider">
        <div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true,
            "effect": "fade",
            "pagination": {
                "el": "#main-slider-pagination",
                "type": "bullets",
                "clickable": true
            },
            "navigation": {
                "nextEl": "#main-slider__swiper-button-next",
                "prevEl": "#main-slider__swiper-button-prev"
            },
            "autoplay": {
                "delay": 5000
            }}'>
            <div class="swiper-wrapper">
                @foreach($image_layer as $val)
                <div class="swiper-slide">
                    <div class="image-layer"
                        style="background-image: url({{asset('storage/image_layer/'.$val->image)}});">
                    </div>
                    <div class="image-layer-overlay"></div>
                    <!-- /.image-layer -->
                    <!-- <div class="main-slider-shape-1"><img src="{{asset('assets')}}/images/shapes/main-slider-shape-1.png" alt="">
                    </div> -->
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="main-slider__content">
                                    <h2>{{$val->title}}</h2>
                                    <p>{{$val->description}}</p>
                                    <a href="#" class="thm-btn">Discover More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- If we need navigation buttons -->
            <div class="swiper-pagination" id="main-slider-pagination"></div>
            <div class="main-slider__nav">
                <div class="swiper-button-prev" id="main-slider__swiper-button-next"><i
                        class="icon-right-arrow icon-left-arrow"></i>
                </div>
                <div class="swiper-button-next" id="main-slider__swiper-button-prev"><i
                        class="icon-right-arrow"></i>
                </div>
            </div>
        </div>
    </section>
    <!--Main Slider End-->

    <!--Brand One Start-->
    @if(@$home_page->brand_is_active == 1)
    @if(@$home_page->feature_is_active AND count($services_feature) > 2)
    <section class="brand-one">
    @else
    <section class="brand-one" style="padding-bottom: 99px">
    @endif
        <div class="container">
            <div class="thm-swiper__slider swiper-container" data-swiper-options='{"spaceBetween": 100, "slidesPerView": 5, "autoplay": { "delay": 5000 }, "breakpoints": {
                "0": {
                    "spaceBetween": 30,
                    "slidesPerView": 2
                },
                "375": {
                    "spaceBetween": 30,
                    "slidesPerView": 2
                },
                "575": {
                    "spaceBetween": 30,
                    "slidesPerView": 3
                },
                "767": {
                    "spaceBetween": 50,
                    "slidesPerView": 4
                },
                "991": {
                    "spaceBetween": 50,
                    "slidesPerView": 5
                },
                "1199": {
                    "spaceBetween": 100,
                    "slidesPerView": 6
                }
            }}'>
                <div class="swiper-wrapper">
                    @foreach($brand as $val_brand)
                    <div class="swiper-slide">
                        <img src="{{asset('storage/brand/'.$val_brand->image)}}" alt="{{$val_brand->title}}" >
                    </div><!-- /.swiper-slide -->
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @else
    <section style="margin-bottom: 120px;"></section>
    @endif
    <!--Brand One End-->

    <!--Feature One Start-->
    @if(@$home_page->feature_is_active AND count($services_feature) > 2)
    <section class="feature-one" >
        <div class="container">
            <div class="feature-one__top">
                <div class="row">
                    @foreach($services_feature as $val_feature)
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                        <!--Feature One Single-->
                        <div class="feature-one__single">
                            <div class="feature-one__icon">
                                <span class="icon-innovation"></span>
                            </div>
                            <div class="feature-one__text">
                                <h3>{{@$val_feature->title}}</h3>
                                <p>{{substr(@$val_feature->short_description, 0, 50) .((strlen(@$val_feature->short_description) > 50) ? '...' : '')}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="feature-one__bottom">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="feature-one__bottom-inner">
                            <p>IT services built specifically for your business. <a href="services.html">Find Your
                                    Solution</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @else
    <section style="margin-bottom: 120px;"></section>
    @endif
    <!--Feature One End-->

    <!--About One Start-->
    @if(@$home_page->about_is_active)
    <section class="about-one">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="about-one__left wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms">
                        <div class="about-one__img-box">
                            <div class="about-one__img">
                                <img src="{{asset('storage/about/'.@$about->image)}}" alt="">
                            </div>
                            <div class="about-one__small-img">
                                <img src="{{asset('storage/about/'.@$about->image_small)}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="about-one__right">
                        <div class="section-title text-left">
                            <span class="section-title__tagline">{{@$about->tagline}}</span>
                            <h2 class="section-title__title">{{@$about->title}}</h2>
                        </div>
                        <p class="about-one__text">{{@$about->description}}</p>
                        <!-- <div class="about-one__points-box">
                            <ul class="about-one__points list-unstyled">
                                <li>
                                    <div class="icon">
                                        <span class="icon-check"></span>
                                    </div>
                                    <div class="text">
                                        <p>Take a look at our round up of the best shows</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <span class="icon-check"></span>
                                    </div>
                                    <div class="text">
                                        <p>It has survived not only five centuries</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <span class="icon-check"></span>
                                    </div>
                                    <div class="text">
                                        <p>Lorem Ipsum has been the ndustry standard dummy text</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="about-one__it-solutions">
                            <div class="about-one__it-solutions-icon">
                                <span class="icon-computer"></span>
                            </div>
                            <div class="about-one__it-solutions-text-box">
                                <p class="about-one__it-solutions-text">We Run all Kinds of IT Solutions & Services
                                    <br> that Vow your Success</p>
                            </div>
                        </div> -->
                        <a href="{{url('about')}}" class="about-one__btn thm-btn">More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!--About One End-->

    <!--Services One Start-->
    @if(@$home_page->services_is_active)
    <section class="services-one">
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">Wide Range of Services</span>
                <h2 class="section-title__title">What We’re Offering</h2>
            </div>
            <div class="row">
                @foreach(@$services as $val_service)
                <div class="col-xl-4 col-lg-4 wow fadeInLeft" data-wow-delay="100ms">
                    <!--Services One Single-->
                    <div class="services-one__single">
                        <div class="services-one__icon">
                            <span class="icon-conversation"></span>
                        </div>
                        <h3 class="services-one__title">
                            <a href="{{url('services/'.$val_service->slug)}}">{{$val_service->title}}</a>
                        </h3>
                        <p class="services-one__text">{{substr(@$val_service->short_description, 0, 80) .((strlen(@$val_service->short_description) > 80) ? '...' : '')}}</p>
                        <div class="services-one__arrow">
                            <a href="{{url('services/'.$val_service->slug)}}"><span class="icon-right-arrow"></span></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    <!--Services One End-->

    <!--Share The Joy Start-->
    @if(@$home_page->trusted_is_active)
    <section class="share-the-joy">
        <div class="share-the-joy__inner">
            <div class="share-the-joy-map"
                style="background-image: url({{asset('assets')}}/images/shapes/share-the-joy-map.png)"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-7">
                        <div class="share-the-joy__left">
                            <h2 class="share-the-joy__title">{{@$home_page->trusted_title}}</h2>
                            <a href="#" class="share-the-joy__btn thm-btn">Discover More</a>
                            <div class="share-the-joy__shape-1">
                                <img src="{{asset('assets')}}/images/shapes/share-the-joy-shape-1.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5">
                        <div class="share-the-joy__right">
                            <div class="share-the-joy__img-box">
                                <div class="share-the-joy__img wow fadeInRight" data-wow-duration="1500ms">
                                    <img src="{{asset('storage/home_page/'.@$home_page->trusted_image)}}" alt=""
                                        class="float-bob-2">
                                </div>
                                <div class="share-the-joy__trusted wow fadeIn" data-wow-duration="1500ms">
                                    <span class="icon-social-media"></span>
                                    <div class="share-the-joy__trusted__content">
                                        <p>Trusted by</p>
                                        <h3 class="odometer" data-count="{{@$home_page->trusted_count}}">{{@$home_page->trusted_count}}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @else
    <section style="margin-bottom: 120px;"></section>
    @endif
    
    <!--Share The Joy End-->

    <!--Project One Start-->
    @if(@$home_page->project_is_active)
    <section class="project-one">
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">Our Case Studies</span>
                <h2 class="section-title__title">Explore Projects</h2>
            </div>
            <div class="project-one__carousel owl-theme owl-carousel">
                <!--Project One Single-->
                @foreach(@$projects as $val_prj)
                <div class="project-one__single">
                    <div class="project-one__img">
                        <img src="{{asset('storage/projects/'.@$val_prj->thumbnail)}}" alt="">
                    </div>
                    <div class="project-one__content">
                        <p class="project-one__tagline">{{@$val_prj->category}}</p>
                        <h2 class="project-one__title"><a href="{{url('projects/'.@$val_prj->slug)}}">{{@$val_prj->title}}</a></h2>
                        <div class="project-one__arrow">
                            <a href="{{url('projects/'.@$val_prj->slug)}}"><span class="icon-right-arrow"></span></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    <!--Project One End-->

    <!--Improve One Start-->
    @if(@$home_page->improve_is_active == 1 AND count(@$services_improve) > 1)
    <section class="improve-one">
        <div class="improve-one-bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
            style="background-image: url({{asset('storage/home_page/'.@$home_page->improve_background)}})"></div>
        <div class="improve-one-bg-overly"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="improve-one__left wow slideInLeft" data-wow-delay="100ms"
                        data-wow-duration="2500ms">
                        <div class="improve-one__img-box">
                            <div class="improve-one__img">
                                <img src="{{asset('storage/home_page/'.@$home_page->improve_image)}}" alt="">
                            </div>
                            <div class="improve-one__project-complete">
                                <p>{{@$home_page->improve_project_complete}} PROJECTS ARE COMPLETED</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="improve-one__right">
                        <div class="section-title text-left">
                            <span class="section-title__tagline">{{@$home_page->improve_tagline}}</span>
                            <h2 class="section-title__title">{{@$home_page->improve_title}}</h2>
                        </div>
                        <ul class="list-unstyled improve-one__points">
                            @foreach(@$services_improve as $val_imp)
                            <li>
                                <div class="icon">
                                    <span class="icon-artificial-intelligence"></span>
                                </div>
                                <div class="text">
                                    <h3>{{@$val_imp->title}}</h3>
                                    <p>{{@$val_imp->short_description}}</p>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!--Improve One End-->

    <!--Testimonial One Start-->
    @if(@$home_page->testimonial_is_active)
    <section class="testimonial-one">
        <div id="particles-js"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5">
                    <div class="testimonial-one__left">
                        <div class="section-title text-left">
                            <span class="section-title__tagline">Customers Feedbacks</span>
                            <h2 class="section-title__title">What They’re Talking About Company</h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-7">
                    <div class="testimonial-one__right">
                        <div class="testimonial-one__carousel owl-theme owl-carousel">
                            <!--Testimonial One Single-->
                            @foreach(@$testimonial as $val_testi)
                            <div class="testimonial-one__single">
                                <div class="testimonial-one__client-info">
                                    <div class="testimonial-one__client-img">
                                        <img src="{{asset('assets')}}/images/user-testimoni.png" alt="">
                                    </div>
                                    <div class="testimonial-one__client-details">
                                        <h5 class="testimonial-one__client-name">{{@$val_testi->name}}</h5>
                                        <p class="testimonial-one__client-title">Customer</p>
                                    </div>
                                </div>
                                <p class="testimonial-one__text">{{substr(@$val_testi->testimoni, 0, 130) .((strlen(@$val_testi->testimoni) > 130) ? '...' : '')}}</p>
                                <div class="testimonial-one__quote">
                                    <span class="icon-right-quote"></span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!--Testimonial One End-->

    <!--News One Start-->
    @if(@$home_page->news_is_active)
    <section class="news-one">
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">Direct from the Blog</span>
                <h2 class="section-title__title">News & Articles</h2>
            </div>
            <div class="row">
                @foreach(@$news as $val_news)
                <div class="col-xl-4 col-lg-4 wow fadeInLeft" data-wow-delay="100ms">
                    <!--News One Single-->
                    <div class="news-one__single">
                        <div class="news-one__img">
                            <img src="{{asset('storage/news/'.@$val_news->thumbnail)}}" alt="">
                            <a href="{{url('news/'.@$val_news->slug)}}">
                                <span class="news-one__plus"></span>
                            </a>
                            <div class="news-one__date-box">
                                <p>{{date('d',strtotime(@$val_news->date))}}<br> {{date('M',strtotime(@$val_news->date))}}</p>
                            </div>
                        </div>
                        <div class="news-one__content">
                            <ul class="list-unstyled news-one__meta">
                                <li><a href="{{url('news/'.@$val_news->slug)}}"><i class="far fa-user-circle"></i> By {{@$val_news->name}}</a></li>
                                <!-- <li><a href="{{url('news/'.@$val_news->slug)}}"><i class="far fa-comments"></i> 2 Comments</a> -->
                                </li>
                            </ul>
                            <h3 class="news-one__title">
                                <a href="{{url('news/'.@$val_news->slug)}}">{{@$val_news->title}}</a>
                            </h3>
                            <p class="news-one__text">{{@$val_news->news_short}}</p>
                            <div class="news-one__read-more">
                                <a href="{{url('news/'.@$val_news->slug)}}" class="news-one__read-more-btn">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    <!--News One End-->

    <!--CTA One Start-->
    @if(@$home_page->cta_is_active == 1)
    <section class="cta-one">
        <div class="cta-one__container">
            <div class="cta-one-bg" style="background-image: url({{asset('storage/home_page/'.@$home_page->cta_background)}})"></div>
            <div class="cta-one-overly"></div>
            <div class="container">
                <div class="col-lg-12">
                    <div class="cta-one__inner">
                        <p class="cta-one__sub-title">{{@$home_page->cta_sub_title}}</p>
                        <h2 class="cta-one__title">{{@$home_page->cta_title}}</h2>
                        <a href="{{url(@$home_page->cta_url)}}" class="cta-one__btn thm-btn">Discover More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
@endsection