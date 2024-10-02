@extends('front.layout.master')

@section('content')


    <div class="destination pt_70 pb_50">
        <div class="container">
            <div class="row">
                @foreach($destinations as $destination)
                    <div class="col-lg-3 col-md-6">
                        <div class="item pb_25">
                            <div class="photo">
                                <a href="{{ route('destination',$destination->slug) }}"><img src="{{ asset('uploads/'.$destination->featured_image) }}" alt=""></a>
                            </div>
                            <div class="text">
                                <h2>
                                    <a href="{{ route('destination',$destination->slug) }}">{{ $destination->name }}</a>
                                </h2>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="container pb_50">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
                {{ $destinations->links() }}
            </div>
        </div>
    </div>

@endsection
