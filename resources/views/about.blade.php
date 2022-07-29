@extends('layouts.master')

@section('content')
    <section class="page-header">
        <div class="page-header-bg" style="background-image: url({{asset('storage/banner/'.@$about->banner)}})">
        </div>
        <div class="page-header-bg-overly"></div>
        <!-- <div class="page-header-shape wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms"
            style="background-image: url(assets/images/shapes/page-header-shape.png)"></div> -->
        <div class="container">
            <div class="page-header__inner">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><span>/</span></li>
                    <li>About</li>
                </ul>
                <h2>About</h2>
            </div>
        </div>
    </section>
    <!--Page Header End-->

    <!--About Two Start-->
    <section class="about-two">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="about-two__left wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms">
                        <div class="about-two__img">
                            <img src="{{asset('storage/about/'.@$about->image)}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="about-two__right">
                        <div class="section-title text-left">
                            <span class="section-title__tagline">{{@$about->tagline}}</span>
                            <h2 class="section-title__title">{{@$about->title}}</h2>
                        </div>
                        <p class="about-two__text-1">{{@$about->description}}</p>
                        <div class="about-two__progress-wrap">
                            <div class="about-two__progress">
                                <div class="about-two__progress-box">
                                    <div class="circle-progress"
                                        data-options='{ "value": 0.9,"thickness": 3,"emptyFill": "#eef3f7","lineCap": "square", "size": 138, "fill": { "color": "#42d9be" } }'>
                                    </div><!-- /.circle-progress -->
                                    <span>90%</span>
                                </div>
                                <div class="about-two__progress-content">
                                    <h3>Successful Projects</h3>
                                </div>
                            </div>
                            <div class="about-two__progress">
                                <div class="about-two__progress-box">
                                    <div class="circle-progress"
                                        data-options='{ "value": 0.5,"thickness": 3,"emptyFill": "#eef3f7","lineCap": "square", "size": 138, "fill": { "color": "#42d9be" } }'>
                                    </div><!-- /.circle-progress -->
                                    <span>50%</span>
                                </div><!-- /.about-five__progress-box -->
                                <div class="about-two__progress-content">
                                    <h3>Problem Solved</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--About Two End-->

    <!--Brand Two Start-->
    @if(@$about->brand_is_active == 1)
    <section class="brand-two">
        <div class="container">
            <div class="brand-two__inner">
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
                        "slidesPerView": 5
                    }
                }}'>
                    <div class="swiper-wrapper">
                        @foreach($brand as $val_brand)
                        <div class="swiper-slide">
                            <img src="{{asset('storage/brand/'.$val_brand->image)}}" alt="{{$val_brand->title}}">
                        </div><!-- /.swiper-slide -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!--Brand Two End-->

    <!--Video One Start-->
    @if(@$about->video_is_active == 1)
    <section class="video-one about-page-video">
        <div class="video-one-bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
            style="background-image: url({{asset('storage/about/'.@$about->video_thumbnail)}})"></div>
        <div class="video-one-bg-overly"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="video-one__inner">
                        <div class="video-one__video-link">
                            <a href="{{@$about->video_url}}" class="video-popup">
                                <div class="video-one__video-icon">
                                    <span class="icon-play-button"></span>
                                    <i class="ripple"></i>
                                </div>
                            </a>
                        </div>
                        <h2 class="video-one__title">{{@$about->video_title}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!--Video One End-->

    <!--Testimonial One Start-->
    @if(@$about->testimonial_is_active == 1)
    <section class="testimonial-one">
        <div id="particles-js"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5">
                    <div class="testimonial-one__left">
                        <div class="section-title text-left">
                            <span class="section-title__tagline">Testimoni Customer</span>
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
                                        <img src="{{asset('assets/images/user-testimoni.png')}}" alt="">
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

    <!--Team One Start-->
    @if(@$about->team_is_active == 1)
    <section class="team-one about-page-team">
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">Professional People</span>
                <h2 class="section-title__title">Meet the Experts</h2>
            </div>
            <div class="row">
                @foreach($team as $val_team)
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <!--Team One Single-->
                    <div class="team-one__single  wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1000ms">
                        <div class="team-one__img">
                            <img src="{{asset('storage/team/'.@$val_team->image)}}" alt="">
                            <div class="team-one__social">
                                <a href="{{@$val_team->twitter}}" target="_blank"><i class="fab fa-twitter"></i></a>
                                <a href="{{@$val_team->facebook}}" target="_blank"><i class="fab fa-facebook"></i></a>
                                <a href="{{@$val_team->instagram}}" target="_blank"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="team-one__content">
                            <h3 class="team-one__name">{{@$val_team->name}}</h3>
                            <p class="team-one__title">{{@$val_team->position}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
@endsection