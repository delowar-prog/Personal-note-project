@extends('layout.main')
@section('content')
    <h3 class="text-center text-decoration-underline">Update Note</h3>
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
        <form action={{ route('update') }} method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="note_id" value={{$note->id}}>
            <div class="my-3">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" name="title" value="{{$note->title}}">
            </div>
            <div class="mb-3">
                <label for="contentInput" class="form-label">Content</label>
                <textarea name="content" class="form-control" id="contentInput" rows="3">{{$note->content}}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Photo</label>
                <input type="file" name="photo" class="form-control">
            </div>
            <div class="mb-3">
                <img src={{asset($note->photo)}} width="120">
            </div>
            <div class="mb-3">
                <input type="submit" value="Update">
            </div>
        </form>
    </div>
@endsection
