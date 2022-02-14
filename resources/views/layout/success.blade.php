@extends('layout.app')

@section('content')
<div class="container d-flex flex-column justify-content-center align-items-center" 
style="height: 20rem; width: 20rem ; margin-top: 3rem; margin-bottom: 3rem;border-radius: 50%;
border: 10px solid #afcae8">
    <h3>{{ __('ebs.index3') }} !</h3>
    <a href="/home">{{ __('ebs.msg3') }}</a>
</div>
@endsection