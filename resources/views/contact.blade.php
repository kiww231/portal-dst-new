@extends('layouts.master')
@push('css')
<link rel="stylesheet" href="{{asset('assets/admin')}}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<!-- Toastr -->
<link rel="stylesheet" href="{{asset('assets/admin')}}/plugins/toastr/toastr.min.css">
@endpush

@push('js')
<script src="{{asset('assets/admin')}}/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="{{asset('assets/admin')}}/plugins/toastr/toastr.min.js"></script>
<script>
    $(function(){
        $( document ).ready(function() {
            var alert = $('#alert').val();
            if(alert == 1){
                toastr.success($('#alert').attr("data-message"));
            }else if(alert == 2){
                toastr.error($('#alert').attr("data-message"));
            }
        });
    });
</script>
@endpush
@section('content')
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <input type="hidden" id="alert" value="2" data-message="{{$error}}" />
    @endforeach
@endif
@if (Session::has('success'))
    <input type="hidden" id="alert" value="1" data-message="{{Session::get('success')}}" />
@elseif (Session::has('error'))
    <input type="hidden" id="alert" value="2" data-message="{{Session::get('error')}}" />
@endif
<section class="page-header">
    <div class="page-header-bg" style="background-image: url({{asset('uploads/banner/'.$contact->banner)}})">
    </div>
    <div class="page-header-bg-overly"></div>
    <!-- <div class="page-header-shape wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms"
        style="background-image: url(assets/images/shapes/page-header-shape.png)"></div> -->
    <div class="container">
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="index.html">Home</a></li>
                <li><span>/</span></li>
                <li>Contact</li>
            </ul>
            <h2>Contact</h2>
        </div>
    </div>
</section>
<!--Page Header End-->

<!--Contact Page Start-->
<section class="contact-page">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4">
                <div class="contact-page__left">
                    <div class="section-title text-left">
                        <span class="section-title__tagline">Contact with us</span>
                        <h2 class="section-title__title">Write Message to Company</h2>
                    </div>
                    <p class="contact-page__text">Lorem ipsum is simply free text available the market dolor sit
                        amet, consectetur notted adipisicing elit sed do.</p>
                    <div class="contact-page__social-list">
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8">
                <div class="contact-page__right">
                    <!-- <form action="{{url('send-testimoni')}}" class="comment-one__form contact-form-validated"
                        novalidate="novalidate" method="post"> -->
                    <form action="{{url('send-testimoni')}}" method="post">
                        @csrf
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
                                    <textarea name="testimoni" placeholder="Write Message"></textarea>
                                </div>
                                <button type="submit" class="thm-btn comment-form__btn">Send a message</button>
                            </div>
                        </div>
                    </form>
                    <!--<div class="result"></div>--><!-- /.result -->
                </div>
            </div>
        </div>
    </div>
</section>
<!--Contact Page End-->

<!--Contact Details End-->
<section class="contact-details">
    <div class="container">
        <div class="contact-details__inner">
            <div class="row">
                <div class="col-xl-4 col-lg-4">
                    <div class="contact-details__single">
                        <div class="contact-details__icon">
                            <span class="icon-map"></span>
                        </div>
                        <div class="contact-details__content">
                            <p class="contact-details__sub-title">Visit Our Store</p>
                            <h5>{{@$contact->address}}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="contact-details__single contact-details__single-2">
                        <div class="contact-details__icon">
                            <span class="icon-email-1"></span>
                        </div>
                        <div class="contact-details__content">
                            <p class="contact-details__sub-title">Send Email</p>
                            <h4><a href="mailto:{{@$contact->email}}">{{@$contact->email}}</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="contact-details__single contact-details__single-3">
                        <div class="contact-details__icon">
                            <span class="icon-phone-call"></span>
                        </div>
                        <div class="contact-details__content">
                            <p class="contact-details__sub-title">Call Anytime</p>
                            <h4><a href="tel:{{@$contact->phone}}">{{@$contact->phone}}</a></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Contact Details End-->

<!--Google Map Start-->
<section class="contact-page-google-map">
    <iframe
        src="{{@$contact->maps_url}}"
        class="contact-page-google-map__one" allowfullscreen></iframe>
</section>
<div style="margin-bottom: 120px;"></div>
@endsection