@extends('layout.app')

@section('content')
<div class="container mt-3" style="width: 50% ;">
    <table class="table table-borderless">
        <thead>
            <tr class="text-center">
                <th scope="col">Title</th>
            </tr>
        </thead>
        @if(!empty($cart))
        <tbody>
            {{-- <form action="/order/submit" method="POST">
                @csrf --}}
            @foreach ($cart as $c)
            <tr class="text-center">
                <td>{{ $c->ebook->title }}</td>
                <td>
                    <form action="/order-delete/{{ $c->id }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="btn btn-link" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        </tbody>
        @endforeach
        @endif
    </table>
    <div class="d-flex justify-content-end mb-5">
        {{-- <input type="submit" style="background-color: #f1da59; width: 7rem;" class=btn value="Submit"> --}}
        <a href="/order/submit" class="btn" style="background-color: #f1da59; width: 7rem;">Submit</a>
    </div>
{{-- </form> --}}

</div>
@endsection