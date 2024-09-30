
@extends('admin.layouts.master')

@section('content')
    @include('admin.components.navbar')

    @include('admin.components.sidebar')

    <div class="main-content">
        <section class="section">
            <div class="section-header justify-content-between ">
                <h1>Create Destination</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin.destination.index') }}" class="btn btn-primary">Show All</a>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.destination.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-3">
                                        <label class="form-label">Photo *</label>
                                        <div>
                                            <input type="file" name="featured_image">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Name *</label>
                                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Slug *</label>
                                                <input type="text" class="form-control" name="slug" value="{{ old('slug') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label ">Description *</label>
                                        <textarea type="text" class="form-control editor" name="description">{{ old('description') }}</textarea>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Country</label>
                                                <input type="text" class="form-control" name="country" value="{{ old('country') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Currency</label>
                                                <input type="text" class="form-control" name="currency" value="{{ old('currency') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Language</label>
                                                <input type="text" class="form-control" name="language" value="{{ old('language') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Timezone</label>
                                                <input type="text" class="form-control" name="timezone" value="{{ old('timezone') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Area</label>
                                                <input type="text" class="form-control" name="area" value="{{ old('area') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label ">Visa Required</label>
                                        <textarea type="text" class="form-control" name="visa_required">{{ old('visa_required') }}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Best Time To Visit</label>
                                        <textarea type="text" class="form-control " name="best_time">{{ old('best_time') }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Activities</label>
                                        <textarea type="text" class="form-control" name="activities">{{ old('activities') }}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Health Safety</label>
                                        <textarea type="text" class="form-control" name="health_safety">{{ old('health_safety') }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Map (Iferme Link)</label>
                                        <textarea type="text" class="form-control" name="health_safety">{{ old('health_safety') }}</textarea>
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

