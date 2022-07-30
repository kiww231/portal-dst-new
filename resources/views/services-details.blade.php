@extends('layouts.master')

@section('content')
<section class="page-header">
    <div class="page-header-bg" style="background-image: url({{asset('uploads/services/'.@$result->banner)}})">
    </div>
    <div class="page-header-bg-overly"></div>
    <!-- <div class="page-header-shape wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms"
        style="background-image: url({{asset('assets')}}/images/shapes/page-header-shape.png)"></div> -->
    <div class="container">
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="{{url('/')}}">Home</a></li>
                <li><span>/</span></li>
                <li>Services</li>
            </ul>
            <h2>{{@$result->title}}</h2>
        </div>
    </div>
</section>
<!--Page Header End-->

<!--Service Details Start-->
<section class="service-details">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <div class="service-details__right">
                    <div class="service-details__img">
                        <img src="{{asset('uploads/services/'.@$result->image)}}" alt="">
                    </div>
                    <div class="service-details__content">
                        <h3 class="service-details__title">{{@$result->title}}</h3>
                        <p class="service-details__text">{!!@$result->description!!}</p>
                    </div>
                    @if(@$services_att->benefits_is_active == 1)
                    <div class="service-details__benefits">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="service-details__benefits-text">
                                    <h3 class="service-details__benefits-title">{{@$services_att->benefits_title}}</h3>
                                    {!!@$services_att->benefits_desc!!}
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="service-details__benefits-img">
                                    <img src="{{asset('uploads/services/'.@$services_att->benefits_image)}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if(@$services_att->faq_is_active == 1)
                    <div class="service-details__faq">
                        <div class="accrodion-grp faq-one-accrodion" data-grp-name="faq-one-accrodion">
                            <div class="accrodion active">
                                <div class="accrodion-title">
                                    <h4>How to process the business IT solution?</h4>
                                </div>
                                <div class="accrodion-content">
                                    <div class="inner">
                                        <p>There are many variations of passages of available but the majority
                                            have in that some form by injected randomised words which don’t look
                                            even as slightly believable now.</p>
                                    </div><!-- /.inner -->
                                </div>
                            </div>
                            <div class="accrodion">
                                <div class="accrodion-title">
                                    <h4>How to process the business IT solution?</h4>
                                </div>
                                <div class="accrodion-content" style="display: none;">
                                    <div class="inner">
                                        <p>There are many variations of passages of available but the majority
                                            have in that some form by injected randomised words which don’t look
                                            even as slightly believable now.</p>
                                    </div><!-- /.inner -->
                                </div>
                            </div>
                            <div class="accrodion">
                                <div class="accrodion-title">
                                    <h4>How to process the business IT solution?</h4>
                                </div>
                                <div class="accrodion-content" style="display: none;">
                                    <div class="inner">
                                        <p>There are many variations of passages of available but the majority
                                            have in that some form by injected randomised words which don’t look
                                            even as slightly believable now.</p>
                                    </div><!-- /.inner -->
                                </div>
                            </div>
                            <div class="accrodion last-chiled">
                                <div class="accrodion-title">
                                    <h4>How to process the business IT solution?</h4>
                                </div>
                                <div class="accrodion-content" style="display: none;">
                                    <div class="inner">
                                        <p>There are many variations of passages of available but the majority
                                            have in that some form by injected randomised words which don’t look
                                            even as slightly believable now.</p>
                                    </div><!-- /.inner -->
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="service-details__sidebar">
                    <div class="service-details__sidebar-service">
                        <h4 class="service-details__sidebar-title">Categories</h4>
                        <ul class="service-details__sidebar-service-list list-unstyled">
                            @foreach($categories as $val_cat)
                            <li @if($val_cat->slug == $result->slug) class="current" @endif>
                                <a href="{{url('services/'.$val_cat->slug)}}" >{{$val_cat->title}}<span class="icon-right-arrow"></span></a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="service-details__need-help">
                        <div class="service-details__need-help-bg"
                            style="background-image: url({{asset('assets')}}/images/backgrounds/service-details-need-help-bg.jpg)">
                        </div>
                        <div class="service-details__need-help-bg-overly"></div>
                        <div class="service-details__need-help-icon">
                            <img src="{{asset('assets')}}/images/shapes/phone-icon.png" alt="">
                        </div>
                        <h2 class="service-details__need-help-text-box">Get Professional Help to Solve <br> IT
                            Software Problems</h2>
                        <div class="service-details__need-help-contact">
                            <a href="tel:926668880000">92 666 888 0000</a>
                            <p>Call Anytime Our <br> to Experts</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div style="margin-bottom: 120px;"></div>
@endsection