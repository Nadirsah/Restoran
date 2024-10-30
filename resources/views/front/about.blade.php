@extends('layouts.front')
@section('navbarcontent')
@include('layouts.front.navbarcontent')
@endsection
@section('content')
<div class="content">



        <!-- About Start -->
        @include('layouts.front.about')
        <!-- About End -->

        <!-- Team Start -->
        @include('layouts.front.team')
        <!-- Team End -->





</div>
@endsection