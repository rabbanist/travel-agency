@extends('admin.layouts.master')

@section('content')
    @include('admin.components.navbar')

    @include('admin.components.sidebar')

    <div class="main-content">
        <section class="section">
            <div class="section-header justify-content-between ">
                <h1>Update Team Member</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin.team_member.index') }}" class="btn btn-primary">Show All</a>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.team_member.update', $team_member->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-3">
                                        <label class="form-label">Existing Photo *</label>
                                        <div>
                                            <img src="{{ asset('uploads/'.$team_member->photo) }}" alt="" class="w_200">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Photo *</label>
                                        <div><input type="file" name="photo"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Name *</label>
                                                <input type="text" class="form-control" name="name" value="{{ $team_member->name }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label ">Slug *</label>
                                                <input type="text" class="form-control" name="slug" value="{{ $team_member->slug }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label ">Designation *</label>
                                                <input type="text" class="form-control" name="designation" value="{{ $team_member->designation }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label ">Address *</label>
                                                <input type="text" class="form-control" name="address" value="{{ $team_member->address }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label ">Email *</label>
                                                <input type="text" class="form-control" name="email" value="{{ $team_member->email }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label ">Phone *</label>
                                                <input type="text" class="form-control" name="phone" value="{{ $team_member->phone }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Facebook</label>
                                                <input type="text" class="form-control" name="facebook" value="{{ $team_member->facebook }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Twitter</label>
                                                <input type="text" class="form-control" name="twitter" value="{{ $team_member->twitter }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">LinkedIn</label>
                                                <input type="text" class="form-control" name="linkedin" value="{{ $team_member->linkedin }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Instagram</label>
                                                <input type="text" class="form-control" name="instagram" value="{{ $team_member->instagram }}">
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Biography *</label>
                                            <textarea name="biography" class="form-control editor" id="" cols="30" rows="10"> {{ $team_member->biography }}</textarea>
                                        </div>
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
