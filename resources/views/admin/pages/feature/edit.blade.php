@extends('admin.layouts.master')

@section('content')
    @include('admin.components.navbar')

    @include('admin.components.sidebar')

    <div class="main-content">
        <section class="section">
            <div class="section-header justify-content-between ">
                <h1>Update Slider</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin.slider.index') }}" class="btn btn-primary">Show All</a>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.slider.update', $slider->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-3">
                                        <label class="form-label">Existing Photo *</label>
                                        <div>
                                            <img src="{{ asset('uploads/'.$slider->photo) }}" alt="" class="w_100">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Photo *</label>
                                        <input type="file" class="form-control" name="photo">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label ">Title *</label>
                                        <input type="text" class="form-control" name="title" value="{{ $slider->title }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Description *</label>
                                        <textarea name="description" class="form-control editor" id="" cols="30" rows="10">{{ $slider->description }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Button Text</label>
                                        <input type="text" class="form-control" name="button_text" value="{{ $slider->button_text }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Button Link</label>
                                        <input type="text" class="form-control" name="button_link" value="{{ $slider->button_link }}">
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
