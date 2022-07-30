<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('admin')}}" class="brand-link">
      <img src="{{asset('assets/admin')}}/images/favicon-dst.png" alt="PT. Daya Sinergi Teknomandiri" class="brand-image" style="opacity: .8">
      <span class="brand-text font-weight-light">Daya Sinergi</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{url('admin')}}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-home"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{url('admin/recruitment')}}" class="nav-link {{ request()->is('admin/recruitment*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user-clock"></i>
                    <p>Recruitment</p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/services*') || request()->is('admin/home-page*') || request()->is('admin/about*') || request()->is('admin/project*') || request()->is('admin/news*') || request()->is('admin/career*') || request()->is('admin/contact*') || request()->is('admin/image-layer*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ request()->is('admin/services*') || request()->is('admin/home-page*') || request()->is('admin/about*') || request()->is('admin/project*') || request()->is('admin/news*') || request()->is('admin/career*') || request()->is('admin/contact*') || request()->is('admin/image-layer*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-laptop-code"></i>
                    <p>Halaman<i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{url('admin/home-page')}}" class="nav-link {{ request()->is('admin/home-page*') || request()->is('admin/image-layer*') ? 'active' : '' }}">
                            <i class="nav-icon far fa-circle"></i>
                            <p>Home Page</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('admin/about')}}" class="nav-link {{ request()->is('admin/about*') ? 'active' : '' }}">
                            <i class="nav-icon far fa-circle"></i>
                            <p>About</p>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('admin/services*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/services*') ? 'active' : '' }}">
                            <i class="nav-icon far fa-circle"></i>
                            <p>Services<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('admin/services')}}" class="nav-link {{ request()->is('admin/services*') && !request()->is('admin/services-*') ? 'active' : '' }}">
                                    <i class="nav-icon far fa-circle"></i>
                                    <p>Data Services</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('admin/services-attribute')}}" class="nav-link {{ request()->is('admin/services-attribute') ? 'active' : '' }}">
                                    <i class="nav-icon far fa-circle"></i>
                                    <p>Atribute Services</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item {{ request()->is('admin/projects*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/projects*') ? 'active' : '' }}">
                            <i class="nav-icon far fa-circle"></i>
                            <p>Projects<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('admin/projects')}}" class="nav-link {{ request()->is('admin/projects*') && !request()->is('admin/projects-*') ? 'active' : '' }}">
                                    <i class="nav-icon far fa-circle"></i>
                                    <p>Data Projects</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('admin/projects-attribute')}}" class="nav-link {{ request()->is('admin/projects-attribute') ? 'active' : '' }}">
                                    <i class="nav-icon far fa-circle"></i>
                                    <p>Atribute Projects</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item {{ request()->is('admin/news*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/news*') ? 'active' : '' }}">
                            <i class="nav-icon far fa-circle"></i>
                            <p>News<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('admin/news')}}" class="nav-link {{ request()->is('admin/news*') && !request()->is('admin/news-*') ? 'active' : '' }}">
                                    <i class="nav-icon far fa-circle"></i>
                                    <p>Data News</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('admin/news-attribute')}}" class="nav-link {{ request()->is('admin/news-attribute') ? 'active' : '' }}">
                                    <i class="nav-icon far fa-circle"></i>
                                    <p>Atribute News</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item {{ request()->is('admin/career*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/career*') ? 'active' : '' }}">
                            <i class="nav-icon far fa-circle"></i>
                            <p>Career<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('admin/career')}}" class="nav-link {{ request()->is('admin/career*') && !request()->is('admin/career-*') ? 'active' : '' }}">
                                    <i class="nav-icon far fa-circle"></i>
                                    <p>Data Career</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('admin/career-attribute')}}" class="nav-link {{ request()->is('admin/career-attribute') ? 'active' : '' }}">
                                    <i class="nav-icon far fa-circle"></i>
                                    <p>Atribute Career</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('admin/contact')}}" class="nav-link {{ request()->is('admin/contact*') ? 'active' : '' }}">
                            <i class="nav-icon far fa-circle"></i>
                            <p>Contact</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{url('admin/team')}}" class="nav-link {{ request()->is('admin/team*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user-friends"></i>
                    <p>Team</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{url('admin/brand')}}" class="nav-link {{ request()->is('admin/brand*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-images"></i>
                    <p>Brand</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{url('admin/testimonial')}}" class="nav-link {{ request()->is('admin/testimonial*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-comment"></i>
                    <p>Testimonial</p>
                </a>
            </li>
            @if(Auth::user()->type == 1)
            <li class="nav-item">
                <a href="{{url('admin/user')}}" class="nav-link {{ request()->is('admin/user*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Users</p>
                </a>
            </li>
            @endif
            <li class="nav-item">
                <a href="{{url('admin/menu')}}" class="nav-link {{ request()->is('admin/menu*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-bars"></i>
                    <p>Menu</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{url('admin/attributes')}}" class="nav-link {{ request()->is('admin/attributes*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-cogs"></i>
                    <p>Attributes Web</p>
                </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>