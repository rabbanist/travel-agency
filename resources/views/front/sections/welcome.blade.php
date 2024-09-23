
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
