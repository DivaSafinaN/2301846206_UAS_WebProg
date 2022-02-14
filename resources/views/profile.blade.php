@extends('layout.app')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="row mt-3">
        <form action="/profile/update" method="POST" enctype="multipart/form-data">
          @method("PUT")
          @csrf
          <div class="row">

            <div class="col-md-auto form-group">
                <img src="{{ asset('storage/'.Auth::user()->image) }}" alt="" width="200px">
            </div>

            <div class="col-md-auto form-group">

              <div class="mb-3 mt-3 row">
                <label for="firstName" class="col-sm-5 col-form-label">{{ __('ebs.fnm') }} :</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control @error('firstName') is-invalid @enderror" id="firstName" name="firstName" 
                  value="{{ old('firstName', Auth::user()->firstName) }}">
                  @error('firstName')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              <div class="mb-3 row">
                <label for="lastName" class="col-sm-5 col-form-label">{{ __('ebs.lnm') }} :</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control @error('lastName') is-invalid @enderror" id="lastName" name="lastName" 
                  value="{{ old('lastName', Auth::user()->lastName) }}">
                  @error('lastName')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              <div class="mb-3 row">
                <label for="gender" class="col-sm-5 col-form-label">{{ __('ebs.gnd') }} :</label>
                <div class="col-sm-6">
                  @foreach($genders as $gender)
                  @if(old('gender_id', Auth::user()->gender_id) == $gender->id)
                <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender_id" 
                    value="{{$gender->id}}" checked>{{ $gender->gender_desc }}
                    @else
                <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender_id" 
                value="{{$gender->id}}">{{ $gender->gender_desc }}                
                  @endif
                  @endforeach
                </div>
              </div>

              <div class="mb-3 row">
                <label for="password" class="col-sm-5 col-form-label">{{ __('ebs.psw') }} :</label>
                <div class="col-sm-6">
                  <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

          </div>

          <div class="col-md-auto form-group">

            <div class="mb-3 mt-3 row">
              <label for="middleName" class="col-sm-4 col-form-label">{{ __('ebs.mnm') }} :</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="middleName" name="middleName" value="{{ old('middleName', Auth::user()->middleName) }}">
              </div>
            </div>

            <div class="mb-3 mt-3 row">
              <label for="email" class="col-sm-4 col-form-label">{{ __('ebs.eml') }} :</label>
              <div class="col-sm-6">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email',Auth::user()->email)}}">
                @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
            </div>

            <div class="mb-3 mt-3 row">
              <label for="role" class="col-sm-4 col-form-label">{{ __('ebs.rl') }} :</label>
              <div class="col-sm-6">
                <input type="text" id="role" name="role_id" value="{{ Auth::user()->role->role_desc }}" readonly>
              </div>
            </div>

            <div class="mb-3 row">
              <label for="img" class="col-sm-4 col-form-label">{{ __('ebs.dp') }} :</label>
              <div class="col-sm-6">
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
            <input type="submit" style="background-color: #f1da59; width: 10rem;" class=btn value="{{ __('ebs.btn8') }}">

          </form>
        </div>
      </div>
</div>
@endsection