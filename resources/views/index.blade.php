@extends('layouts.front')
@section('navbarhomecontent')
@include('layouts.front.navbarhomecontent')
@endsection
@section('content')
<div class="content">

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