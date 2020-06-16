@extends('layouts.app-admin')

@section('content')
<div class="row">
    <div class="col-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <h2 class="text-dark mb-1 font-weight-medium">{{ count($post) }}</h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate ml-2">Articles</h6>
                        </div>
                        <span class="badge badge-primary text-white badge-pill d-lg-block d-md-none">{{ $postWeek }} New this week</span>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted"><i class="far fa-newspaper fa-3x"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <h2 class="text-dark mb-1 font-weight-medium">145</h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate ml-2">Comments</h6>
                        </div>
                        <span class="badge badge-success text-white badge-pill d-lg-block d-md-none">10 New this week</span>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted"><i class="far fa-comments fa-3x"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <h2 class="text-dark mb-1 font-weight-medium">{{ $user }}</h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate ml-2">Users</h6>
                        </div>
                        <span class="badge badge-primary text-white badge-pill d-lg-block d-md-none">{{ $userWeek }} New this week</span>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted"><i class="far fa-user fa-3x"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection