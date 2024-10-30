@extends('layouts.front')
@section('content')
<div class="content">


        <!-- Navbar & Hero Start -->
        @include('layouts.front.navbarhome')
        <!-- Navbar & Hero End -->


        <!-- Service Start -->
        @include('layouts.front.service')
        <!-- Service End -->


        <!-- About Start -->
        @include('layouts.front.about')
        <!-- About End -->


        <!-- Menu Start -->
        @include('layouts.front.menu')
        <!-- Menu End -->


        <!-- Reservation Start -->
        @include('layouts.front.reservation')
        <!-- Reservation Start -->


        <!-- Team Start -->
        @include('layouts.front.team')
        <!-- Team End -->


        <!-- Testimonial Start -->
        @include('layouts.front.testimonial')
        <!-- Testimonial End -->






</div>
@endsection