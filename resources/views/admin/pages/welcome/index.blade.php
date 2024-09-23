@extends('admin.layouts.master')

@section('content')
    @include('admin.components.navbar')

    @include('admin.components.sidebar')

    <div class="main-content">
        <section class="section">
            <div class="section-header justify-content-between ">
                <h1>Welcome Item Edit</h1>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.welcome-item.update', $item->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf


                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Existing Photo</label>
                                                <div><img src="{{ asset('uploads/'.$item->photo) }}" alt="" class="w_300"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Change Photo</label>
                                                <div><input type="file" name="photo"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Existing Video</label>
                                                <iframe class="iframe1" width="400" height="200" src="https://www.youtube.com/embed/{{ $item->video }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Video (YouTube Id) *</label>
                                                <input type="text" class="form-control" name="video" value="{{ $item->video }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label ">Title *</label>
                                        <input type="text" class="form-control" name="title" value="{{ $item->title }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Description *</label>
                                        <textarea name="description" class="form-control editor" id="" cols="30" rows="10">{{ $item->description }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Button Text</label>
                                        <input type="text" class="form-control" name="button_text" value="{{ $item->button_text }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Button Link</label>
                                        <input type="text" class="form-control" name="button_link" value="{{ $item->button_link }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <select name="status" class="form-select">
                                            <option value="Show" {{ $item->status == 'Show' ? 'selected' : '' }}>Show</option>
                                            <option value="Hide" {{ $item->status == 'Hide' ? 'selected' : '' }}>Hide</option>
                                        </select>
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
