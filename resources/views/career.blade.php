@extends('layouts.master')

@section('content')
<section class="page-header">
    <div class="page-header-bg" style="background-image: url({{asset('uploads/banner/'.@$attribute->banner)}})">
    </div>
    <div class="page-header-bg-overly"></div>
    <!-- <div class="page-header-shape wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms"
        style="background-image: url(assets/images/shapes/page-header-shape.png)"></div> -->
    <div class="container">
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="{{url('/')}}">Home</a></li>
                <li><span>/</span></li>
                <li>Career</li>
            </ul>
            <h2>Career</h2>
        </div>
    </div>
</section>
<section class="news-one news-page">
    <div class="container">
        <div class="row">
            @if(count(@$career) > 0)
            @foreach(@$career as $val_career)
            <div class="col-xl-4 col-lg-4 wow fadeInLeft" data-wow-delay="100ms">
                <!--News One Single-->
                <div class="news-one__single">
                    <div class="news-one__img">
                        <img src="{{asset('uploads/career/'.$val_career->thumbnail)}}" alt="">
                        <a href="{{url('career/'.@$val_career->slug)}}">
                            <span class="news-one__plus"></span>
                        </a>
                    </div>
                    <div class="news-one__content">
                        <ul class="list-unstyled news-one__meta">
                            <li><a href="#"><i class="far fa-calendar"></i> {{date('d M',strtotime(@$val_career->start_date))}} - {{date('d M Y',strtotime(@$val_career->end_date))}}</a></li>
                        </ul>
                        <h3 class="news-one__title">
                            <a href="{{url('career/'.@$val_career->slug)}}">{{@$val_career->title}}</a>
                        </h3>
                        <p class="news-one__text">{{@$val_career->short_description}}</p>
                        <div class="news-one__read-more">
                            <a href="{{url('career/'.@$val_career->slug)}}" class="news-one__read-more-btn">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="text-center">Lowongan Pekerjaan Belum Tersedia</div>
            @endif
        </div>
    </div>
</section>
<div style="margin-bottom: 120px;"></div>
@endsection