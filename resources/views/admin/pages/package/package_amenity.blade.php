
@extends('admin.layouts.master')

@section('content')
    @include('admin.components.navbar')

    @include('admin.components.sidebar')

    <div class="main-content">
        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Amenity of {{ $package->name }}</h1>
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
                                            <th>Amenity</th>
                                            <th>Type</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($package_amenities_include as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->amenity->name }}</td>

                                                @if($item->type == 'included')
                                                    <td>
                                                        <span class="badge badge-success"> {{ $item->type }}</span>
                                                    </td>
                                                @else
                                                    <td>
                                                        <span class="badge badge-danger"> {{ $item->type }}</span>
                                                    </td>
                                                @endif

                                                <td>
                                                    <a href="{{ route('admin.package_amenity.delete',$item->id) }}" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?')">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <h3>Exclude</h3>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Amenity</th>
                                            <th>Type</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($package_amenities_exclude as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->amenity->name }}</td>

                                                @if($item->type == 'included')
                                                    <td>
                                                        <span class="badge badge-success"> {{ $item->type }}</span>
                                                    </td>
                                                @else
                                                    <td>
                                                        <span class="badge badge-danger"> {{ $item->type }}</span>
                                                    </td>
                                                @endif

                                                <td>
                                                    <a href="{{ route('admin.package_amenity.delete',$item->id) }}" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?')">Delete</a>
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
                                <form action="{{ route('admin.package_amenity.store',$package->id) }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Amenity *</label>
                                        <select name="amenity_id" class="form-control">
                                            <option value="">Select Amenity</option>
                                            @foreach($amenities as $amenity)
                                                <option value="{{ $amenity->id }}">{{ $amenity->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Type *</label>
                                        <select name="type" class="form-control">
                                            <option value="">Select Type</option>
                                            <option value="included">Included</option>
                                            <option value="excluded">Excluded</option>
                                        </select>
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

