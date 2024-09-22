@extends('front.layout.master')

@section('content')
    <div class="page-top" style="background-image: url('{{ asset('uploads/banner.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Dashboard</h2>
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content user-panel pt_70 pb_70">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-12">

                    @include('front.user.sidebar')

                </div>
                <div class="col-lg-9 col-md-12">
                    <h3 class="mb_20">{{ Auth::user()->name }}</h3>
                    <div class="row box-items">
                        <div class="col-md-4">
                            <div class="box1">
                                <h4>3</h4>
                                <p>Completed Orders</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box2">
                                <h4>2</h4>
                                <p>Pending Orders</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection