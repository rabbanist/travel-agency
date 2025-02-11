
@extends('admin.layouts.master')

@section('content')
    @include('admin.components.navbar')

    @include('admin.components.sidebar')

    <div class="main-content">
        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Photo of {{ $package->name }}</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin.package.index') }}" class="btn btn-primary"><i class="fas fa-plus"></i> back to previous</a>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-body">

                                <h3>Include</h3>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Photo</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($packagePhotos as $packagePhoto)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <img src="{{ asset('uploads/'.$packagePhoto->photo) }}" alt="" class="w_150">
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.package_photo.delete',$packagePhoto->id) }}" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?')">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.package_photo.store',$package->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label mt-2">Photo *</label>
                                        <input type="file" name="photo[]" class="form-control" multiple>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"></label>
                                        <button type="submit" class="btn btn-primary">Submit</button>
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

