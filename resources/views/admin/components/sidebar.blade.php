<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html"></a>
        </div>

        <ul class="sidebar-menu">

            <li class="{{ Request::is('admin/dashboard') ? 'active' : ''}}"><a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-hand-point-right"></i> <span>Dashboard</span></a></li>

            <li class="{{ Request::is('admin/slider') || Request::is('admin/slider/*') ? 'active' :  ''}}">
                <a class="nav-link" href="{{ route('admin.slider.index') }}">
                    <i class="fas fa-hand-point-right"></i> <span>Slider</span>
                </a>
            </li>

            <li class="{{ Request::is('admin/welcome-item') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.welcome-item.index') }}">
                    <i class="fas fa-hand-point-right"></i> <span>Welcome Item</span></a>
            </li>

            <li class="{{ Request::is('admin/feature*')  ? 'active' :  ''}}"><a class="nav-link" href="{{ route('admin.feature.index') }}"><i class="fas fa-hand-point-right"></i> <span>Feature</span></a></li>
            <li class="{{ Request::is('admin/testimonial*') ? 'active' :  ''}}"><a class="nav-link" href="{{ route('admin.testimonial.index') }}"><i class="fas fa-hand-point-right"></i> <span>Testimonial</span></a></li>

            <li class="{{ Request::is('admin/team-member*') ? 'active' :  ''}}"><a class="nav-link" href="{{ route('admin.team_member.index') }}"><i class="fas fa-hand-point-right"></i> <span>Team Member</span></a></li>

            <li class="{{ Request::is('admin/faq*') ? 'active' :  ''}}"><a class="nav-link" href="{{ route('admin.faq.index') }}"><i class="fas fa-hand-point-right"></i> <span>FAQ</span></a></li>

            <li class="nav-item dropdown {{ Request::is('admin/blog*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Blog Section</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/blog-category*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.blog_category.index') }}"><i class="fas fa-angle-right"></i>Category</a></li>
                    <li class="{{ Request::is('admin/blog-post*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.blog_post.index') }}"><i class="fas fa-angle-right"></i> Post</a></li>
                </ul>
            </li>

            <li class="{{ Request::is('admin/destination*') ? 'active' :  ''}}"><a class="nav-link" href="{{ route('admin.destination.index') }}"><i class="fas fa-hand-point-right"></i> <span>Destination</span></a></li>

{{--            <li class="{{ Request::is('admin/package') || Request::is('admin/package/*') ? 'active' :  ''}}"><a class="nav-link" href="{{ route('admin.package.index') }}"><i class="fas fa-hand-point-right"></i> <span>Package</span></a></li>--}}


            <li class="{{ Request::is('admin/package*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.package.index') }}"><i class="fas fa-hand-point-right"></i> <span>Package</span></a></li>

            <li class="{{ Request::is('admin/amenity*') ? 'active' :  ''}}"><a class="nav-link" href="{{ route('admin.amenity.index') }}"><i class="fas fa-hand-point-right"></i> <span>Amenity</span></a></li>


            <li class="{{ Request::is('admin/counter-item*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.counter-item.index') }}"><i class="fas fa-hand-point-right"></i> <span>Counter Item</span></a></li>

            <li class="{{ Request::is('admin/profile*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.profile') }}"><i class="fas fa-hand-point-right"></i> <span>Profile</span></a></li>
        </ul>
    </aside>
</div>
