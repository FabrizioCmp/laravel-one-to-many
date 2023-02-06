@extends('layouts.app')

@section('content')
<div class="card text-center mx-auto mt-3" style="width: 18rem;">
    <img src="{{asset('storage/' . $project->cover_img)}}" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">{{$project->name}}</h5>
      <div> <b>Type:</b>  <u>{{$project->type->name}}</u></div>
      <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius, velit.</p>
      <a href="{{route('admin.projects.edit', $project->id)}}" class="btn btn-primary">edit</a>
    </div>
  </div>
@endsection