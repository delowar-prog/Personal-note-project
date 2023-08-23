@extends('layout.main')
@section('content')
    <h3 class="text-center text-decoration-underline">Add a Note</h3>
    <p class="text-center text-success fw-bold">{{ session('message') }}</p>
    <div class="w-25 mx-auto">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </div>
    <div class="w-50 mx-auto my-5">
        <a href={{ route('home') }} class="btn btn-primary btn-sm">Note List</a>
        <form action={{ route('add') }} method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="titleInput" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="titleInput" placeholder="Notes Title">
            </div>
            <div class="mb-3">
                <label for="contentInput" class="form-label">Content</label>
                <textarea name="content" class="form-control" id="contentInput" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Photo</label>
                <input type="file" name="photo" class="form-control">
            </div>
            <div class="mb-3">
                <input type="submit" value="Add Note">
            </div>
        </form>
    </div>
@endsection
