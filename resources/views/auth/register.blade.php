@extends('layout.app')

@section('content')
<div class="container">
    <div class="row mt-3">
        <h3 style="text-decoration-line: underline">{{ __('ebs.title1') }}</h3>
        <form action="/sign-up" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-md-6 form-group">

              <div class="mb-3 mt-3 row">
                <label for="firstName" class="col-sm-3 col-form-label">{{ __('ebs.fnm') }} :</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control @error('firstName') is-invalid @enderror" id="firstName" name="firstName" value="{{ old('firstName') }}">
                  @error('firstName')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              <div class="mb-3 row">
                <label for="lastName" class="col-sm-3 col-form-label">{{ __('ebs.lnm') }} :</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control @error('lastName') is-invalid @enderror" id="lastName" name="lastName" value="{{ old('lastName') }}">
                  @error('lastName')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              <div class="mb-3 row">
                <label for="gender" class="col-sm-3 col-form-label">{{ __('ebs.gnd') }} :</label>
                <div class="col-sm-8">
                  @foreach($genders as $gender)
                  <div class="form-check form-check-inline">
                    <input class="form-check-input @error('gender_id') is-invalid @enderror" type="radio" name="gender_id" 
                    value="{{$gender->id}}">{{ $gender->gender_desc }}
                  </div>
                  @endforeach
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

          <div class="col-md-6 form-group">

            <div class="mb-3 mt-3 row">
              <label for="middleName" class="col-sm-3 col-form-label">{{ __('ebs.mnm') }} :</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="middleName" name="middleName" value="{{ old('middleName') }}">
              </div>
            </div>

            <div class="mb-3 mt-3 row">
              <label for="email" class="col-sm-3 col-form-label">{{ __('ebs.eml') }} :</label>
              <div class="col-sm-8">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
            </div>

            <div class="mb-3 mt-3 row">
              <label for="role" class="col-sm-3 col-form-label">{{ __('ebs.rl') }} :</label>
              <div class="col-sm-8">
                  <select class="form-select @error('role_id') is-invalid @enderror" aria-label="Default select example" id="role" name="role_id">
                      <option selected></option>
                      @foreach($roles as $role)
                      <option value="{{ $role->id }}">{{ $role->role_desc }}</option>
                      @endforeach
                    </select>
              </div>
            </div>

            <div class="mb-3 row">
              <label for="img" class="col-sm-3 col-form-label">{{ __('ebs.dp') }} :</label>
              <div class="col-sm-8">
                  <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="img" name="img">
                  @error('image')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
            </div>

          </div>
          
        </div>
   
          <div class="container d-flex justify-content-center flex-column align-items-center mt-3 mb-5">
            <input type="submit" style="background-color: #f1da59; width: 10rem;" class=btn value="Submit">

          </form>
            <a href="/login">{{ __('ebs.msg1') }}</a>
        </div>
      </div>
</div>
@endsection