@extends('layout.app')

@section('content')
<div class="container mt-3" style="width: 50%; margin-bottom: 13rem">
<form action="/account-maintenance/update/{{ $user->id }}" method="POST">
    @method("PUT")
    @csrf
    <p>{{ $user->fullName }}</p>
    <div class="mb-3 mt-3 row">
     <label for="role" class="col-sm-3 col-form-label">{{ __('ebs.rl') }} :</label>
     <div class="col-sm-8">
           <select class="form-select" name="role_id">
             @foreach($role as $rol)
             @if(old('role_id', $user->role_id) == $rol->id)
             <option value="{{ $rol->id }}" selected>{{ $rol->role_desc }}</option>
             @else
             <option value="{{ $rol->id }}">{{ $rol->role_desc }}</option>
             @endif
             @endforeach
           </select>
     </div>
   </div>
   <div class="col-sm-8" style="margin-left: 10rem; margin-top: 1rem">
     <input type="submit" style="background-color: #f1da59; width: 5rem;" class=btn value="{{ __('ebs.btn8') }}">
   </div>
</form>
</div>
@endsection