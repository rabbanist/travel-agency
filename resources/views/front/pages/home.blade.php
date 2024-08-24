@extends('front.layout.master')

@section('content')

    {{-- Slider --}}
    @include('front.sections.slider')
    {{-- Slider End--}}

    {{-- welcome --}}
    @include('front.sections.welcome')
    {{-- welcome End--}}

    {{-- Destination--}}
    @include('front.sections.destinations')
    {{-- Destination End --}}

    {{-- Why Choose--}}
    @include('front.sections.why-choose')
    {{-- Why Choose--}}

    {{-- Popular Package--}}
    @include('front.sections.popular-package')
    {{-- Popular Package End--}}

    {{--Clinet Testimonial--}}
    @include('front.sections.client-testimonial')
    {{--Clinet Testimonial End--}}

    {{-- Latest News--}}
    @include('front.sections.latest-news')
    {{-- Latest News End--}}

@endsection
