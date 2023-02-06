@extends('layouts.app')

@section('content')
    <div class="container">
        <form class="mt-3" action="{{ Route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Project name</label>
                <input type="text" name="name" class="form-control w-25">
            </div>

            <div class="mb-3">
                <label for="form-label">Cover</label>
                <input type="file" name="cover_img" class="form-control w-50">
            </div>

            <div class="mb-3">
                <label class="form-label">Project type</label>
                <select class="form-select w-25 @error('type_id') is-invalid @enderror" name="type_id">
                    <option></option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
                @error('type_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="form-label">Github link</label>
                <input type="text" name="github_link" class="form-control w-50">
            </div>
            <div>
                <button class="btn btn-success"> Create</button>
            </div>
        </form>
    </div>
@endsection
