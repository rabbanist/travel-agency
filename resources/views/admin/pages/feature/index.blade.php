@extends('admin.layouts.master')

@section('content')
    @include('admin.components.navbar')

    @include('admin.components.sidebar')

    <div class="main-content">
        <section class="section">
            <div class="section-header justify-content-between ">
                <h1>Features</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin.feature.create') }}" class="btn btn-primary">Add New</a>
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
                                            <th>Icon</th>
                                            <th>Title</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($features as $feature)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                               <i class="{{ $feature->icon }} fz_30"></i>
                                            </td>
                                            <td>{{ $feature->title }}</td>
                                            <td class="pt_10 pb_10">
                                                <a href="{{ route('admin.feature.edit', $feature->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                <a href="{{ route('admin.feature.delete', $feature->id) }}" class="btn btn-danger"
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
