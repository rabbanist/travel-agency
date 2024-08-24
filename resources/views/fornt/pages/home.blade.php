@extends('fornt.layout.master')

@section('content')

    {{-- Slider --}}
    @include('fornt.sections.slider')
    {{-- Slider End--}}

    {{-- welcome --}}
    @include('fornt.sections.welcome')
    {{-- welcome End--}}

    {{-- Destination--}}
    @include('fornt.sections.destinations')
    {{-- Destination End --}}

    {{-- Why Choose--}}
    @include('fornt.sections.why-choose')
    {{-- Why Choose--}}

    {{-- Popular Package--}}
    @include('fornt.sections.popular-package')
    {{-- Popular Package End--}}

    {{--Clinet Testimonial--}}
    @include('fornt.sections.client-testimonial')
    {{--Clinet Testimonial End--}}

    {{-- Latest News--}}
    @include('fornt.sections.latest-news')
    {{-- Latest News End--}}

    {{--Impotant Pages--}}
    @include('fornt.sections.important-pages')
    {{--Impotant Pages End--}}

@endsection
