@extends('admin.layouts.master')

@section('content')
    @include('admin.components.navbar')

    @include('admin.components.sidebar')

    <div class="main-content">
        <section class="section">
            <div class="section-header justify-content-between ">
                <h1>Create Testimonial</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin.testimonial.index') }}" class="btn btn-primary">Show All</a>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.testimonial.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Photo *</label>
                                        <input type="file" class="form-control" name="photo">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Icon *</label>
                                        <input type="text" class="form-control" name="icon">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label ">Name *</label>
                                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label ">Designation *</label>
                                        <input type="text" class="form-control" name="designation" value="{{ old('designation') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Comment *</label>
                                        <textarea name="comment" class="form-control editor" id="" cols="30" rows="10" value="{{ old('comment') }}"></textarea>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label"></label>
                                        <button type="submit" class="btn btn-primary">Create</button>
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
