<header class="main-header clearfix">
    <div class="main-header__top clearfix">
        <div class="main-header__top-inner clearfix">
            <div class="main-header__top-left">
                <ul class="list-unstyled main-header__top-address">
                    <li>
                        <div class="icon">
                            <span class="icon-pin"></span>
                        </div>
                        <div class="text">
                            <p>{{@$main_contact->address}}</p>
                        </div>
                    </li>
                    <li>
                        <div class="icon">
                            <span class="icon-email"></span>
                        </div>
                        <div class="text">
                            <p><a href="mailto:{{@$main_contact->email}}">{{@$main_contact->email}}</a></p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="main-header__top-right">
                <div class="main-header__top-right-text">
                    <p><span>Now Hiring:</span>Are you a driven and motivated 1st Line IT Support Engineer?</p>
                </div>
                <div class="main-header__top-right-social">
                    <a href="{{@$main_contact->youtube}}"><i class="fab fa-youtube"></i></a>
                    <a href="{{@$main_contact->twitter}}"><i class="fab fa-twitter"></i></a>
                    <a href="{{@$main_contact->instagram}}"><i class="fab fa-instagram"></i></a>
                    <a href="{{@$main_contact->facebook}}"><i class="fab fa-facebook"></i></a>
                </div>
            </div>
        </div>
    </div>
    <nav class="main-menu clearfix">
        <div class="main-menu-wrapper clearfix">
            <div class="main-menu-wrapper-inner clearfix">
                <div class="main-menu-wrapper__left clearfix">
                    <div class="main-menu-wrapper__logo" >
                        <a href="{{url('/')}}"><img src="{{asset('storage/attributes/'.\App\Models\Attributes::first()->logo)}}" alt="" style="height: 40px;"></a>
                    </div>
                    <div class="main-menu-wrapper__main-menu">
                        <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                        <ul class="main-menu__list">
                            @php
                                $main_menu = \App\Models\Menu::where('is_active',1)->orderBy('order','ASC')->get();
                            @endphp
                            @foreach($main_menu as $mm)
                            @if($mm->parent == 0)
                            <li class="dropdown {{ Request::segment(1) == $mm->path ? 'current' : '' }}">
                                <a href="{{url($mm->path)}}">{{$mm->title}}</a>
                                <ul>
                                    @php
                                        $main_sub = \App\Models\Menu::where('is_active',1)->where('parent',$mm->id)->orderBy('order','ASC')->get();
                                    @endphp
                                    @foreach($main_sub as $ms)
                                    <li><a href="{{url($ms->path)}}">{{$ms->title}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="main-menu-wrapper__right">
                    <!-- <div class="main-menu-wrapper__call">
                        <div class="main-menu-wrapper__call-icon">
                            <img src="{{asset('assets')}}/images/shapes/phone-icon.png" alt="">
                        </div>
                        <div class="main-menu-wrapper__call-number">
                            <p>Have any questions?</p>
                            <h5><a href="tel:{{@$main_contact->phone}}">Free: {{@$main_contact->phone}}</a></h5>
                        </div>
                    </div> -->
                    <div class="main-menu-wrapper">
                        <a href="#" class="main-menu-wrapper__search search-toggler icon-magnifying-glass"></a>
                        <!-- <a href="contact.html" class="main-menu-wrapper__cart icon-avatar"></a> -->
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

<div class="stricky-header stricked-menu main-menu">
    <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
</div><!-- /.stricky-header -->