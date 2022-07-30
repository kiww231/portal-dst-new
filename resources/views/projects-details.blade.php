@extends('layouts.master')

@section('content')
<section class="page-header">
    <div class="page-header-bg" style="background-image: url({{asset('uploads/projects/'.@$projects->banner)}})">
    </div>
    <div class="page-header-bg-overly"></div>
    <!-- <div class="page-header-shape wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms"
        style="background-image: url(assets/images/shapes/page-header-shape.png)"></div> -->
    <div class="container">
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="{{url('/')}}">Home</a></li>
                <li><span>/</span></li>
                <li>Projects</li>
            </ul>
            <h2>{{@$projects->title}}</h2>
        </div>
    </div>
</section>
<!--Page Header End-->

<!--Projects Page Start-->
<section class="project-details">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="project-details__img-box">
                    <img src="{{asset('uploads/projects/'.$projects->image)}}" alt="">
                    <div class="project-details__details-box">
                        <ul class="project-details__details-info list-unstyled">
                            <li>
                                <h5 class="project-details__client">Clients:</h5>
                                <p class="project-details__name">{{@$projects->client}}</p>
                            </li>
                            <li>
                                <h5 class="project-details__client">Category:</h5>
                                <p class="project-details__name">{{@$projects->category}}</p>
                            </li>
                            <li>
                                <h5 class="project-details__client">Date:</h5>
                                <p class="project-details__name">{{@$projects->date}}</p>
                            </li>
                            <li>
                                <div class="project-details__social-list">
                                    <a href="{{@$main_contact->youtube}}"><i class="fab fa-youtube"></i></a>
                                    <a href="{{@$main_contact->twitter}}"><i class="fab fa-twitter"></i></a>
                                    <a href="{{@$main_contact->instagram}}" class="clr-ins"><i class="fab fa-instagram"></i></a>
                                    <a href="{{@$main_contact->facebook}}" class="clr-fb"><i class="fab fa-facebook"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="project-details__content">
                    <h2 class="project-details__title">{{@$projects->title}}</h2>
                    <p class="project-details__text-1">{!!@$projects->description!!}</p>
                </div>
                <div class="project-details__pagination-box">
                    <ul class="project-details__pagination list-unstyled">
                        <li class="next">
                            @if(@$previous)
                            <a href="{{url('projects/'.@$previous)}}" aria-label="Previous"><i class="icon-right-arrow"></i>Previous</a>
                            @endif
                        </li>
                        <li class="count"><a href="#"></a></li>
                        <li class="count"><a href="#"></a></li>
                        <li class="count"><a href="#"></a></li>
                        <li class="count"><a href="#"></a></li>
                        <li class="previous">
                            @if(@$next)
                            <a href="{{url('projects/'.@$next)}}" aria-label="Next">Next<i class="icon-right-arrow"></i></a>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Project Details End-->

<!--Similar Work Start-->
<section class="simialr-work project-two">
    <div class="container">
        <div class="section-title text-center">
            <span class="section-title__tagline">Checkout Recent Cases</span>
            <h2 class="section-title__title">Our Similar Work</h2>
        </div>
        <div class="row">
            @foreach(@$projects_get as $val_get)
            <div class="col-xl-4 col-lg-4">
                <!--Project One Single-->
                <div class="project-one__single">
                    <div class="project-one__img">
                        <img src="{{asset('uploads/projects/'.@$val_get->thumbnail)}}" alt="">
                    </div>
                    <div class="project-one__content">
                        <p class="project-one__tagline">{{@$val_get->category}}</p>
                        <h2 class="project-one__title"><a href="{{url('projects/'.@$val_get->slug)}}">{{@$val_get->title}}</a></h2>
                        <div class="project-one__arrow">
                            <a href="{{url('projects/'.@$val_get->slug)}}"><span class="icon-right-arrow"></span></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<div style="margin-bottom: 120px;"></div>
@endsection