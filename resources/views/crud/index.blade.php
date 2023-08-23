@extends('layout.main')
@section('content')
    <h3 class="text-center text-decoration-underline">List of All Notes</h3>
    <p class="text-center text-success fw-bold">{{ session('message') }}</p>
    <div class="w-50 mx-auto my-5">
        <a href={{ route('create') }} class="btn btn-primary btn-sm">Add note</a>
        <table class="table table-primary my-3">
            <thead>
                <tr>
                    <th scope="col">Sl</th>
                    <th scope="col">Title</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($notes as $note)
                    <tr>
                        <td width="10%">{{ $i++ }}</td>
                        <td width="60%">{{ $note->title }}</td>
                        <td class="d-flex gap-1">
                            <a href={{route('view', $note->id)}} class="btn btn-primary btn-sm"><i class="fa-regular fa-eye"></i></a>
                            <a href={{route('edit', $note->id)}} class="btn btn-info btn-sm"><i class="fa-regular fa-pen-to-square"></i></a>
                            <form action="{{route('delete')}}" method="post">
                                @csrf
                                <input type="hidden" name="note_id" value="{{$note->id}}">
                                <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
