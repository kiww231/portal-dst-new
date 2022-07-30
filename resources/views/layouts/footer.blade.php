<footer class="site-footer">
    <div class="site-footer__top">
        <div class="container">
            <div class="site-footer__top-inner" @if(!request()->is('/')) style="padding-top: 120px;" @endif>
                <div class="site-footer-map"
                    style="background-image: url({{asset('assets')}}/images/shapes/site-footer-mape.png)"></div>
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                        <div class="footer-widget__column footer-widget__about">
                            <div class="footer-widget__about-logo">
                                <a href="index.html"><img src="{{asset('uploads/attributes/'.\App\Models\Attributes::first()->logo_white)}}" alt="" style="height: 50px;"></a>
                            </div>
                            <p class="footer-widget__about-text">There are many vari of pass of lorem ipsum
                                availab but the majority have suffered in some forms.</p>
                            <div class="footer-widget__about-social">
                                <a href="{{@$main_contact->youtube}}"><i class="fab fa-youtube"></i></a>
                                <a href="{{@$main_contact->twitter}}"><i class="fab fa-twitter"></i></a>
                                <a href="{{@$main_contact->instagram}}"><i class="fab fa-instagram"></i></a>
                                <a href="{{@$main_contact->facebook}}"><i class="fab fa-facebook"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                        <div class="footer-widget__column footer-widget__links clearfix">
                            <h3 class="footer-widget__title">Links</h3>
                            <ul class="footer-widget__links-list list-unstyled clearfix">
                                @foreach(\App\Models\Menu::where('is_active',1)->where('parent',0)->get() as $val_main_mn)
                                <li><a href="{{url($val_main_mn->path)}}">{{$val_main_mn->title}}</a></li>
                                @endforeach
                            </ul>
                            <ul class="footer-widget__links-list footer-widget__links-list-two list-unstyled clearfix">
                                @foreach(\App\Models\Services::where('is_active',1)->get() as $val_main_sv)
                                <li><a href="{{url('services/'.$val_main_sv->slug)}}">{{$val_main_sv->title}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                        <div class="footer-widget__column footer-widget__contact">
                            <h3 class="footer-widget__title">Contact</h3>
                            <p class="footer-widget__contact-text">{{@$main_contact->address}}</p>
                            <ul class="list-unstyled footer-widget__contact-list">
                                <li>
                                    <div class="icon">
                                        <span class="icon-email"></span>
                                    </div>
                                    <div class="text">
                                        <p><a href="mailto:{{@$main_contact->email}}">{{@$main_contact->email}}</a></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <span class="icon-telephone"></span>
                                    </div>
                                    <div class="text">
                                        <p><a href="tel:{{@$main_contact->phone}}">{{@$main_contact->phone}}</a></p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                        <div class="footer-widget__column footer-widget__newsletter">
                            <h3 class="footer-widget__title">Newsletter</h3>
                            <p class="footer-widget__newsletter-text">Subscribe to our newsletter for daily new
                                and updates</p>
                            <form class="footer-widget__newsletter-form mc-form"
                                data-url="https://xyz.us18.list-manage.com/subscribe/post?u=20e91746ef818cd941998c598&id=cc0ee8140e">
                                <div class="footer-widget__newsletter-input-box">
                                    <input type="email" placeholder="Email address" name="email">
                                    <button type="submit" class="footer-widget__newsletter-btn">Send</button>
                                </div>
                            </form>
                            <div class="mc-form__response"></div><!-- /.mc-form__response -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="site-footer__bottom">
        <div class="site-footer__bottom-container">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="site-footer__bottom-inner">
                            <div class="site-footer__bottom-left">
                                <p class="site-footer__bottom-text">{!! @$main_attributes->copyright !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>