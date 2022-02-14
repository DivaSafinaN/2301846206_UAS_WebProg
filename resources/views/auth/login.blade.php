@extends('layout.app')

@section('content')
<div class="container">
    <div class="row mt-3">

      @if(session()->has('loginError'))
      <div class="alert alert-danger alert-dismissible fade show col-6" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
        <h3 style="text-decoration-line: underline">{{ __('ebs.title2') }}</h3>
        <form action="/login" method="POST">
          @csrf        
          <div class="col-6">
              <div class="mb-3 mt-3 row">
                  <label for="email" class="col-sm-3 col-form-label">{{ __('ebs.eml') }} :</label>
                  <div class="col-sm-8">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
  
                <div class="mb-3 row">
                  <label for="password" class="col-sm-3 col-form-label">{{ __('ebs.psw') }} :</label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
          </div>     
          
          <div class="container d-flex justify-content-center flex-column align-items-center mt-5" style="margin-bottom: 5rem">
            <input type="submit" style="background-color: #f1da59; width: 10rem;" class=btn value="Submit">
          </form>
            <a href="/sign-up">{{__('ebs.msg2')}}</a>
        </div>
      </div>
</div>
@endsection