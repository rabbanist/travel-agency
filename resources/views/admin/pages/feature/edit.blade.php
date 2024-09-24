@extends('admin.layouts.master')

@section('content')
    @include('admin.components.navbar')

    @include('admin.components.sidebar')

    <div class="main-content">
        <section class="section">
            <div class="section-header justify-content-between ">
                <h1>Update Slider</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin.feature.index') }}" class="btn btn-primary">Show All</a>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.feature.update', $feature->id) }}" method="post">
                                    @csrf

                                    <div class="mb-3">
                                        <label class="form-label ">Existing Icon *</label>
                                        <div>
                                            <i class="{{ $feature->icon }} fz_50"></i>
                                        </div>

                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Icon *</label>
                                        <input type="text" class="form-control" name="icon" value="{{ $feature->icon }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label ">Title *</label>
                                        <input type="text" class="form-control" name="title" value="{{ $feature->title }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Description *</label>
                                        <textarea name="description" class="form-control editor" id="" cols="30" rows="10">{{ $feature->description }}</textarea>
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
