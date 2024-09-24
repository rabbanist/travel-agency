@extends('front.layout.master')

@section('content')
    @if($welcome_item->status == 'Show')
        <div class="special pt_70 pb_70">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="full-section">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="left-side">
                                        <div class="inner">
                                            <h3>{{ $welcome_item->title }}</h3>
                                            {!! $welcome_item->description !!}
                                            <div class="button-style-1 mt_20">
                                                <a href="{{ $welcome_item->button_link }}">{{ $welcome_item->button_text }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="right-side" style="background-image: url({{ asset('uploads/'.$welcome_item->photo) }});">
                                        <a class="video-button" href="https://www.youtube.com/watch?v={{ $welcome_item->video }}"><span></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif


    <div class="why-choose pt_70">
        <div class="container">
            <div class="row">
                @foreach($features as $feature)
                    <div class="col-md-4">
                        <div class="inner pb_70">
                            <div class="icon">
                                <i class="{{ $feature->icon }}"></i>
                            </div>
                            <div class="text">
                                <h2>{{ $feature->title }}</h2>
                                <p>
                                    {!! $feature->description !!}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <div class="counter-section pt_70 pb_70">
        <div class="container">
            <div class="row counter-items">
                <div class="col-md-3 counter-item">
                    <div class="counter">40</div>
                    <div class="text">Destinations</div>
                </div>
                <div class="col-md-3 counter-item">
                    <div class="counter">1200</div>
                    <div class="text">Clients</div>
                </div>
                <div class="col-md-3 counter-item">
                    <div class="counter">130</div>
                    <div class="text">Packages</div>
                </div>
                <div class="col-md-3 counter-item">
                    <div class="counter">60</div>
                    <div class="text">Feedbacks</div>
                </div>
            </div>
        </div>
    </div>

@endsection
