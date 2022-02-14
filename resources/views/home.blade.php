@extends('layout.app')

@section('content')
<div class="container mt-3" style="width: 50%">
    <table class="table table-bordered">
        <thead>
            <tr class="text-center">
                <th scope="col">Author</th>
                <th scope="col">Title</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
            <tr>
                <td>{{ $book->author }}</td>
                <td> <a href="/books/{{ $book->title }}" class="text-dark">{{ $book->title }}</a></td>
            </tr>
        </tbody>
        @endforeach
    </table>
</div>
@endsection