@extends('admin.layouts.master')

@section('content')
    @include('admin.components.navbar')

    @include('admin.components.sidebar')

    <div class="main-content">
        <section class="section">
            <div class="section-header justify-content-between ">
                <h1>Update Testimonial</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin.testimonial.index') }}" class="btn btn-primary">Show All</a>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.testimonial.update', $testimonial->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Existing Photo *</label>
                                                <div>
                                                    <img src="{{ asset('uploads/'.$testimonial->photo) }}" alt="" class="w_100">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Existing Icon *</label>
                                                <div>
                                                    <i class="{{ $testimonial->icon }} fz_50"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Photo *</label>
                                                <input type="file" class="form-control" name="photo">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Icon *</label>
                                                <input type="text" class="form-control" name="icon"  value="{{ $testimonial->icon }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label ">Name *</label>
                                        <input type="text" class="form-control" name="name" value="{{ $testimonial->name }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label ">Designation *</label>
                                        <input type="text" class="form-control" name="designation" value="{{ $testimonial->designation }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Comment *</label>
                                        <textarea name="comment" class="form-control editor" id="" cols="30" rows="10">{{ $testimonial->comment }}</textarea>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label"></label>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


@endsection
