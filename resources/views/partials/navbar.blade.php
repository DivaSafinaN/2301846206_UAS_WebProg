<div class="container-fluid" style="background-color: #afcae8; height: 90px;">
    <div class="col-sm-6 position-absolute top-0 start-50 translate-middle-x d-flex justify-content-center align-items-center" 
      style="height: 90px;">
      <a class="nav-link" href="/"><h2 style="color: black">Amazing E-Book</h2></a>
    </div>
      <div class="col-sm-2 position-absolute top-0 end-0 d-flex justify-content-center align-items-center" 
      style="margin-right: 5rem; height: 90px;width: 20%">
      
      <ul class="navbar-nav mx-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" 
          aria-expanded="false" style="color: black">
          {{strtoupper(Lang::locale())}}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" href="lang/id">ID</a></li>
            <li><a class="dropdown-item" href="lang/en">EN</a></li>
          </ul>
        </li>
      </ul>


      @auth
      <form action="/logout" method="POST">
        @csrf       
        <input type="submit" style="background-color: #f1da59;" class=btn value="{{ __('ebs.title3') }}">
      </form>
      @else 
      <a href="/sign-up" class="mx-auto nav-link" style="background-color: #f1da59; color: black">{{ __('ebs.title1') }}</a>
      <a href="/login" class="mx-auto nav-link" style="background-color: #f1da59; color: black">{{ __('ebs.title2') }}</a>
      @endauth
    </div>         
</div>

@auth
<div class="container-fluid" style="padding: 0;">
  <nav class="nav" style="background-color: #f1da59;justify-content: space-evenly">
    <li class="nav-item">
      <a class="nav-link" style="color: black;" href="/home">{{ __('ebs.btn1') }}</a>
    </li>
    <li class="nav-item px">
      <a class="nav-link" style="color: black" href="/cart">{{ __('ebs.btn2') }}</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" style="color: black" href="/profile">{{ __('ebs.btn3') }}</a>
    </li>
    @if(Auth::user()->role_id == "1")
    <li class="nav-item">
      <a class="nav-link" style="color: black" href="/account-maintenance">{{ __('ebs.btn4') }}</a>
    </li>    
    @endif   
  </nav>
</div>
@endauth