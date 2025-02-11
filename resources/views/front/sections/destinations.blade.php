<div class="destination pt_70 pb_70">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>Popular Destinations</h2>
                    <p>
                        Explore our most popular travel destinations around the world
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($destinations as $destination)
            <div class="col-lg-3 col-md-6">
                <div class="item pb_25">
                    <div class="photo">
                        <a href="{{ route('destination',$destination->slug) }}"><img src="{{ ('uploads/'.$destination->featured_image ) }}" alt=""></a>
                    </div>
                    <div class="text">
                        <h2>
                            <a href="">{{ $destination->name }}</a>
                        </h2>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="see-more">
                    <div class="button-style-1 mt_20">
                        <a href="">View All Destinations</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
