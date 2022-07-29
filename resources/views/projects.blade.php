@extends('layouts.master')

@section('content')
<section class="page-header">
    <div class="page-header-bg" style="background-image: url({{asset('storage/banner/'.@$projects_att->banner)}})">
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
            <h2>Projects</h2>
        </div>
    </div>
</section>
<!--Page Header End-->

<!--Projects Page Start-->
<section class="project-two project-page">
    <div class="container">
        <div class="row">
            @if(count($projects) > 0)
            @foreach(@$projects as $val_prj)
            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="100ms">
                <!--Project One Single-->
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
            </div>
            @endforeach
            @else
                Data Projects Kosong
            @endif
        </div>
    </div>
</section>
<div style="margin-bottom: 120px;"></div>
@endsection