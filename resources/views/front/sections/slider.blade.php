<div class="slider">
    <div class="slide-carousel owl-carousel">
        @foreach($sliders as $slider)
            <div class="item" style="background-image:url({{ asset('uploads/'.$slider->photo) }});">
                <div class="bg"></div>
                <div class="text">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="text-wrapper">
                                    <div class="text-content">
                                        <h2>{{ $slider->title }}</h2>
                                        <p>
                                            {!! $slider->description !!}
                                        </p>
                                        @if($slider->button_text!='')
                                            <div class="button-style-1 mt_20">
                                                <a href="{{ $slider->button_link }}" target="_blank">{{ $slider->button_text }}</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
