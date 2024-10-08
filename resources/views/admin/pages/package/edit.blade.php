@extends('admin.layouts.master')

@section('content')
    @include('admin.components.navbar')

    @include('admin.components.sidebar')

    <div class="main-content">
        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Edit Package</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin.package.index') }}" class="btn btn-primary"><i class="fas fa-plus"></i> View All</a>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.package.update',$package->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Existing Featured Photo</label>
                                                <div><img src="{{ asset('uploads/'.$package->featured_photo) }}" alt="" class="w_200"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Change Featured Photo</label>
                                                <div><input type="file" name="featured_photo"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Existing Banner</label>
                                                <div><img src="{{ asset('uploads/'.$package->banner) }}" alt="" class="w_200"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Change Banner</label>
                                                <div><input type="file" name="banner"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Name *</label>
                                                <input type="text" class="form-control" name="name" value="{{ $package->name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Slug *</label>
                                                <input type="text" class="form-control" name="slug" value="{{ $package->slug }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Description *</label>
                                        <textarea name="description" class="form-control editor" cols="30" rows="10">{{ $package->description }}</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Price *</label>
                                                <input type="text" class="form-control" name="price" value="{{ $package->price }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Old Price</label>
                                                <input type="text" class="form-control" name="old_price" value="{{ $package->old_price }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Select Destination *</label>
                                                <select name="destination_id" class="form-select">
                                                    @foreach($destinations as $destination)
                                                        <option value="{{ $destination->id }}" @if($package->destination_id == $destination->id) selected @endif>{{ $destination->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Map (iframe code)</label>
                                        <textarea name="map" class="form-control h_100" cols="30" rows="10">{{ $package->map }}</textarea>
                                    </div>
                                    <div class="mb-3">
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
