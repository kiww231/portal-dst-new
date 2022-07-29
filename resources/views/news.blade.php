@extends('layouts.master')

@section('content')
<section class="page-header">
    <div class="page-header-bg" style="background-image: url({{asset('storage/banner/'.@$attribute->banner)}})">
    </div>
    <div class="page-header-bg-overly"></div>
    <!-- <div class="page-header-shape wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms"
        style="background-image: url(assets/images/shapes/page-header-shape.png)"></div> -->
    <div class="container">
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="index.html">Home</a></li>
                <li><span>/</span></li>
                <li>News</li>
            </ul>
            <h2>Latest News</h2>
        </div>
    </div>
</section>
<!--Page Header End-->

<!--News Page Start-->
<section class="news-one news-page">
    <div class="container">
        <div class="row">
            @foreach(@$news as $val_news)
            <div class="col-xl-4 col-lg-4 wow fadeInLeft" data-wow-delay="100ms">
                <!--News One Single-->
                <div class="news-one__single">
                    <div class="news-one__img">
                        <img src="{{asset('storage/news/'.$val_news->thumbnail)}}" alt="">
                        <a href="{{url('news/'.@$val_news->slug)}}">
                            <span class="news-one__plus"></span>
                        </a>
                        <div class="news-one__date-box">
                            <p>{{date('d',strtotime(@$val_news->date))}}<br> {{date('M',strtotime(@$val_news->date))}}</p>
                        </div>
                    </div>
                    <div class="news-one__content">
                        <ul class="list-unstyled news-one__meta">
                            <li><a href="#"><i class="far fa-user-circle"></i> by {{@$val_news->name}}</a></li>
                            <!-- <li><a href="#"><i class="far fa-comments"></i> 2 Comments</a></li> -->
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
            <!-- <div class="col-xl-12 text-center">
                <a href="#" class="thm-btn">Load more</a>
            </div> -->
        </div>
    </div>
</section>
<div style="margin-bottom: 120px;"></div>
@endsection