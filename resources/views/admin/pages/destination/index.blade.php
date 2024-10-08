@extends('admin.layouts.master')

@section('content')
    @include('admin.components.navbar')

    @include('admin.components.sidebar')

    <div class="main-content">
        <section class="section">
            <div class="section-header justify-content-between ">
                <h1>Destination</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin.destination.create') }}" class="btn btn-primary">Add New</a>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="example1">
                                        <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>Gallery</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($destinations as $destination)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <img src="{{ asset('uploads/'.$destination->featured_image) }}" alt="" class="w_100">
                                                </td>
                                                <td>{{ $destination->name }}</td>
                                                <td>
                                                    <a href="{{ route('admin.destination_photo',$destination->id) }}" class="btn btn-success btn-sm">Photo Gallery</a>
                                                    <a href="{{ route('admin.destination_video',$destination->id) }}" class="btn btn-success btn-sm">Video Gallery</a>
                                                </td>
                                                <td class="pt_10 pb_10">
                                                    <a href="{{ route('admin.destination.edit', $destination->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ route('admin.destination.delete', $destination->id) }}" class="btn btn-danger"
                                                       onClick="return confirm('Are you sure?');"><i
                                                            class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
