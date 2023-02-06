@extends('layouts.app')
@section('content')
    <div class="jumbotron p-5 mb-4 bg-light rounded-3">
        <div class="container py-5">

            @if (!Auth::user())
                <h1 class="display-5 fw-bold">
                    Welcome to your projects portfolio
                </h1>

                <p class="col-md-8 fs-4">If you already have an account, login to manage your portfolio.</p>
                <p class="col-md-8 fs-4">If you don't, please sign-in.</p>
            @else
                <h1 class="">Projects</h1>
                <a class="btn btn-primary" href="{{Route('admin.projects.index')}}">View projects</a>
                <a class="btn btn-success" href="">Create  project</a>
            @endif
        </div>
        
    </div>
@endsection
