
@extends('admin.layouts.master')

@section('content')
    @include('admin.components.navbar')

    @include('admin.components.sidebar')

    <div class="main-content">
        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Itinerary of {{ $package->name }}</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin.package.index') }}" class="btn btn-primary"><i class="fas fa-plus"></i> back to previous</a>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h3>Existing Itinerary</h3>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Itinerary</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($packageItineraries as $packageItinerary)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $packageItinerary->name }}</td>
                                                <td>
                                                    {!! $packageItinerary->description !!}
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.package_itinerary.delete',$packageItinerary->id) }}" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?')">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h3>Add New Itinerary</h3>
                                <form action="{{ route('admin.package_itinerary.store',$package->id) }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Itinerary *</label>
                                        <input type="text" name="name" class="form-control" value="{{old('name')}}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Description *</label>
                                        <textarea name="description" class="form-control editor">{{ old('description') }}</textarea>
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

