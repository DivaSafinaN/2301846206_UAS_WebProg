@extends('layout.app')

@section('content')
<div class="container mt-3" style="width: 50%">
    <table class="table table-borderless">
        <thead>
            <tr style="text-align: center">
                <th scope="col">{{ __('ebs.acc') }}</th>
                <th colspan="2" scope="col">{{ __('ebs.act') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr style="text-align: center">
                <td>{{ $user->fullName }} - {{ $user->role->role_desc }}</td>
                <td><a href="/account-maintenance/{{ $user->id }}" class="btn btn-link">{{ __('ebs.btn5') }}</a>
                <td>
                    <form action="/account-delete/{{ $user->id }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-link" type="submit">{{ __('ebs.btn6') }}</button>
                    </form>
                </td>
                
            </tr>
        </tbody>
        @endforeach
    </table>
</div>
@endsection