@extends('layouts.master')
@push('css')

@endpush
@section('content')
<section class="page-header">
    <div class="page-header-bg" style="background-image: url({{asset('storage/news/'.$news->banner)}})">
    </div>
    <div class="page-header-bg-overly"></div>
    <!-- <div class="page-header-shape wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms"
        style="background-image: url(assets/images/shapes/page-header-shape.png)"></div> -->
    <div class="container">
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="{{url('/')}}">Home</a></li>
                <li><span>/</span></li>
                <li>News</li>
            </ul>
            <h2>{{@$news->title}}</h2>
        </div>
    </div>
</section>
<!--Page Header End-->

<!--News Page Start-->
<section class="news-details">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <div class="news-details__left">
                    <div class="news-details__img">
                        <img src="{{asset('storage/news/'.@$news->image)}}" alt="">
                        <div class="news-details__date-box">
                            <p>{{date('d',strtotime(@$news->date))}}<br> {{date('M',strtotime(@$news->date))}}</p>
                        </div>
                    </div>
                    <div class="news-details__content">
                        <ul class="list-unstyled news-details__meta">
                            <li><a href="news-details.html"><i class="far fa-user-circle"></i> by {{@$news->name}}</a></li>
                            <!-- <li><a href="news-details.html"><i class="far fa-comments"></i> 2 Comments</a> -->
                            </li>
                        </ul>
                        <h3 class="news-details__title">{{@$news->title}}</h3>
                        <p class="news-details__text-1">{!!@$news->news!!}</p>
                    </div>
                    <div class="news-details__bottom">
                        <p class="news-details__tags" >
                            <span>Share</span>
                        </p>
                        <div class="news-details__social-list">
                            {!! $shareComponent !!}
                        </div>
                    </div>
                    <!-- <div class="news-details__pagenation-box">
                        <ul class="list-unstyled news-details__pagenation clearfix">
                            <li>What is Holding Back the IT <br> Solution Industry?</li>
                            <li>What is Holding Back the IT <br> Solution Industry?</li>
                        </ul>
                    </div> -->
                    <!-- <div class="comment-one">
                        <h3 class="comment-one__title">2 Comments</h3>
                        <div class="comment-one__single">
                            <div class="comment-one__image">
                                <img src="assets/images/blog/comment-1-1.png" alt="">
                            </div>
                            <div class="comment-one__content">
                                <h3>Kevin Martin <span>3 September, 2021</span></h3>
                                <p>Lorem Ipsum is simply dummy text of the rinting and typesetting been the
                                    industry standard dummy text ever sincer condimentum purus. In non ex at
                                    ligula fringilla lobortis.</p>
                                <a href="#" class="thm-btn comment-one__btn">reply</a>
                            </div>
                        </div>
                        <div class="comment-one__single">
                            <div class="comment-one__image">
                                <img src="assets/images/blog/comment-1-2.png" alt="">
                            </div>
                            <div class="comment-one__content">
                                <h3>Sarah Albert <span>3 September, 2021</span></h3>
                                <p>Lorem Ipsum is simply dummy text of the rinting and typesetting been the
                                    industry standard dummy text ever sincer condimentum purus. In non ex at
                                    ligula fringilla lobortis.</p>
                                <a href="#" class="thm-btn comment-one__btn">reply</a>
                            </div>
                        </div>
                    </div>
                    <div class="comment-form">
                        <h3 class="comment-form__title">Leave a Comment</h3>
                        <form action="assets/inc/sendemail.php" class="comment-one__form contact-form-validated"
                            novalidate="novalidate">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="comment-form__input-box">
                                        <input type="text" placeholder="Full Name" name="name">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="comment-form__input-box">
                                        <input type="email" placeholder="Email Address" name="email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="comment-form__input-box">
                                        <textarea name="message" placeholder="Write Message"></textarea>
                                    </div>
                                    <button type="submit" class="thm-btn comment-form__btn">submit
                                        comment</button>
                                </div>
                            </div>
                        </form>
                    </div> -->
                </div>
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="sidebar">
                    <div class="sidebar__single sidebar__search">
                        <form action="#" class="sidebar__search-form">
                            <input type="search" placeholder="Search here">
                            <button type="submit"><i class="icon-magnifying-glass"></i></button>
                        </form>
                    </div>
                    <div class="sidebar__single sidebar__categories">
                        <h3 class="sidebar__title">Categories</h3>
                        <ul class="sidebar__categories-list list-unstyled">
                            @foreach($categories as $val_cat)
                            <li>
                                <a href="{{url('services/'.$val_cat->slug)}}" >{{$val_cat->title}}<span class="icon-right-arrow"></span></a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="sidebar__single sidebar__post">
                        <h3 class="sidebar__title">Latest Posts</h3>
                        <ul class="sidebar__post-list list-unstyled">
                            @foreach($late_news as $val_ln)
                            <li>
                                <div class="sidebar__post-image">
                                    <img src="assets/images/blog/lp-1-1.jpg" alt="">
                                </div>
                                <div class="sidebar__post-content">
                                    <h3>
                                        <a href="{{url('news/'.$val_ln->slug)}}" class="sidebar__post-content_meta"><i
                                                class="far fa-user-circle"></i>by {{$val_ln->name}}</a>
                                        <a href="{{url('news/'.$val_ln->slug)}}">{{$val_ln->title}}</a>
                                    </h3>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- <div class="sidebar__single sidebar__tags">
                        <h3 class="sidebar__title">Tags</h3>
                        <div class="sidebar__tags-list">
                            <a href="#" class="thm-btn sidebar__tags-btn">Software</a>
                            <a href="#" class="thm-btn sidebar__tags-btn">cyber</a>
                            <a href="#" class="thm-btn sidebar__tags-btn">IT</a>
                            <a href="#" class="thm-btn sidebar__tags-btn">Computing</a>
                            <a href="#" class="thm-btn sidebar__tags-btn">Consulting</a>
                            <a href="#" class="thm-btn sidebar__tags-btn">Business</a>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
<div style="margin-bottom: 120px;"></div>
@endsection