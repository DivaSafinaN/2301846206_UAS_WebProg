@extends('layout.app')

@section('content')
<div class="container mt-3" style="width: 50%">
<h5 style="text-decoration: underline; margin-bottom: 1rem; margin-top: 3rem">E-Book Detail</h5>
<p>{{ __('ebs.ttl') }} : {{ $book->title }}</p>
<p>{{ __('ebs.wrt') }} : {{ $book->author }}</p>
<p>{{ __('ebs.desc') }} : <p>{{ $book->description }}</p> </p>

<div class="container d-flex justify-content-end mb-4">
    <form action="/order/{{ $book->id }}" method="POST">
          @csrf
            <input type="submit" style="background-color: #f1da59; width: 10rem;" class=btn value="{{ __('ebs.btn7') }}">
    </form>
  </div>

</div>
@endsection