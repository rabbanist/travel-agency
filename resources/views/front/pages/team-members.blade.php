@extends('front.layout.master')

@section('content')

    <div class="page-top" style="background-image: url('{{ asset('uploads/banner.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Team Members</h2>
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Team Members</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="team pt_70">
        <div class="container">
            <div class="row">
                @foreach($team_members as $team_member)
                <div class="col-lg-3 col-md-6">
                    <div class="item pb_50">
                        <div class="photo">
                            <img src="{{ asset('uploads/'.$team_member->photo) }}" alt="" />
                        </div>
                        <div class="text">
                            <h2><a href="{{ route('team.member',$team_member->slug) }}">{{ $team_member->name }}</a></h2>
                            <div class="designation">{{ $team_member->designation }}</div>
                            @if($team_member->facebook != '' || $team_member->twitter != '' || $team_member->linkedin != '' || $team_member->instagram != '')
                                <div class="social">
                                    <ul>
                                        @if($team_member->facebook != '')
                                            <li><a href="{{ $team_member->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                                        @endif
                                        @if($team_member->twitter != '')
                                            <li><a href="{{ $team_member->twitter }}"><i class="fab fa-twitter"></i></a></li>
                                        @endif
                                        @if($team_member->linkedin != '')
                                            <li><a href="{{ $team_member->linkedin }}"><i class="fab fa-linkedin-in"></i></a></li>
                                        @endif
                                        @if($team_member->instagram != '')
                                            <li><a href="{{ $team_member->instagram }}"><i class="fab fa-instagram"></i></a></li>
                                        @endif
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
