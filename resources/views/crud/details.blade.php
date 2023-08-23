@extends('layout.main')
@section('content')
    <h3 class="text-center text-decoration-underline">Note details</h3>
    <div class="w-50 mx-auto my-5">
        <a href={{ route('home') }} class="btn btn-primary btn-sm">Back to Home</a>
        <div class="my-5 border p-3">
            <h5 class="text-success">Note Title: {{$singlenote->title}}</h5>
            <img src={{asset($singlenote->photo)}} width="150" class="my-3" alt="image">
            <p><span class="fw-bold text-align-justify">Note Details</span> : {{$singlenote->content}}</p>
        </div>
    </div>
@endsection
