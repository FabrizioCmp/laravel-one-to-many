@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('admin.types.store') }}" method="POST">
            @csrf

            <div class="my-3 ">
                <label class="form-label"> Type name</label>
                <input type="text" class="form-control w-50" name="name">
            </div>
            <button class="btn btn-success">Create project type</button>
        </form>
    </div>
@endsection
