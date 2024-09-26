@extends('admin.layouts.master')

@section('content')
    @include('admin.components.navbar')

    @include('admin.components.sidebar')

    <div class="main-content">
        <section class="section">
            <div class="section-header justify-content-between ">
                <h1>Create FAQ</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin.faq.index') }}" class="btn btn-primary">Show All</a>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.faq.store') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Question *</label>
                                        <input type="text" class="form-control" name="question" value="{{ old('question') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Answer *</label>
                                        <textarea name="answer" class="form-control editor" id="" cols="30" rows="10">{{ old('answer') }}</textarea>
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
