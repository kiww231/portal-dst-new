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
            <div class="col-xl-8 col-lg-7">
                <div class="row">
                    @foreach(@$news as $val_news)
                    <div class="col-xl-6 col-lg-6 wow fadeInLeft" data-wow-delay="100ms">
                        <!--News One Single-->
                        <div class="news-one__single">
                            <div class="news-one__img">
                                <img src="{{asset('uploads/news/'.$val_news->thumbnail)}}" alt="">
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
                                    <li><a href="{{url('news/category/'.@$val_news->id_category)}}"><i class="far fa-bookmark"></i> {{@$val_news->title_category}}</a></li>
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
                    @if(count($news) == 0)
                        <div class="col-xl-12 col-lg-12 wow fadeInLeft" data-wow-delay="100ms">
                            Belum Ada Berita...
                        </div>
                    @endif
                </div>
            </div>
            <!-- <div class="col-xl-12 text-center">
                <a href="#" class="thm-btn">Load more</a>
            </div> -->
            <div class="col-xl-4 col-lg-5">
                <div class="sidebar">
                    <div class="sidebar__single sidebar__search">
                        <form action="{{url('news')}}" method="get" class="sidebar__search-form">
                            <input type="search" name="s" placeholder="Cari...">
                            <button type="submit"><i class="icon-magnifying-glass"></i></button>
                        </form>
                    </div>
                    <div style="margin-bottom: 30px;"></div>
                    <div class="service-details__sidebar-service">
                        <h4 class="service-details__sidebar-title">Categories</h4>
                        <ul class="service-details__sidebar-service-list list-unstyled">
                            @foreach($categories as $val_cat)
                            <li @if($val_cat->id == @$id_category) class="current" @endif>
                                <a href="{{url('news/category/'.$val_cat->id)}}" >{{$val_cat->title}}<span class="icon-right-arrow"></span></a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div style="margin-bottom: 120px;"></div>
@endsection