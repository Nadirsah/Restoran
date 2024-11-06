<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
    <a href="" class="navbar-brand p-0">
        <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Restoran</h1>
        <!-- <img src="img/logo.png" alt="Logo"> -->
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0 pe-4">
            
            <a href="{{route('home')}}" class="nav-item nav-link {{(request()->segment(2) == 'index') ? 'active' : '' }} ">{{__('navbar.home')}}</a>
            <a href="{{route('about')}}" class="nav-item nav-link {{(request()->segment(2) == 'about') ? 'active' : '' }}">{{__('navbar.about')}}</a>
            <a href="{{route('service')}}" class="nav-item nav-link {{(request()->segment(2) == 'service') ? 'active' : '' }}">Service</a>
            <a href="{{route('menu')}}" class="nav-item nav-link {{(request()->segment(2) == 'menu') ? 'active' : '' }}">Menu</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle {{in_array(request()->segment(2),['booking','team','testimonial']) ? 'active' : '' }}" data-bs-toggle="dropdown">Pages</a>
                <div class="dropdown-menu m-0">
                    <a href="{{route('booking')}}" class="dropdown-item ">Booking</a>
                    <a href="{{route('team')}}" class="dropdown-item ">Our Team</a>
                    <a href="{{route('testimonial')}}" class="dropdown-item ">Testimonial</a>
                </div>
            </div>
            <a href="{{route('contact')}}" class="nav-item nav-link {{(request()->segment(2) == 'contact') ? 'active' : '' }}">Contact</a>
        </div>
        @include('layouts.front.lang')
    </div>
</nav>