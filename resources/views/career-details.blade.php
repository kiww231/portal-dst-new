@extends('layouts.master')

@section('content')
<section class="page-header">
    <div class="page-header-bg" style="background-image: url({{asset('storage/career/'.$career->banner)}})">
    </div>
    <div class="page-header-bg-overly"></div>
    <!-- <div class="page-header-shape wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms"
        style="background-image: url(assets/images/shapes/page-header-shape.png)"></div> -->
    <div class="container">
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="{{url('/')}}">Home</a></li>
                <li><span>/</span></li>
                <li><a href="{{url('/career')}}">Career</a></li>
            </ul>
            <h2>Lowongan {{@$career->title}}</h2>
        </div>
    </div>
</section>
<!--Page Header End-->

<!--News Page Start-->
<section class="news-details">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-7">
                <div class="news-details__left">
                    <div class="news-details__img">
                        <img src="{{asset('storage/career/'.@$career->image)}}" alt="">
                    </div>
                    <div class="news-details__content">
                        <ul class="list-unstyled news-details__meta">
                            <li>{{date('d M',strtotime(@$career->start_date))}} - {{date('d M Y',strtotime(@$career->end_date))}}</li>
                        </ul>
                        <h3 class="news-details__title">{{@$career->title}}</h3>
                        <p class="news-details__text-1">Job Description {!!@$career->description!!}</p>
                    </div>
                    <div class="news-details__bottom">
                        <p class="news-details__tags">
                            <a href="{{url('recruitment/'.$career->slug)}}">Lamar</a>
                        </p>
                        <div class="news-details__social-list">
                            {!!$shareComponent!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div style="margin-bottom: 120px;"></div>
@endsection