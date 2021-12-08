<nav class="navbar navbar-expand-lg navbar-light">
<img src="{{ URL::asset('image/logo.png') }}" alt="Pizza-Hut_Logo" class="navbar-brand">
  <div class="collapse navbar-collapse" id="navbarSupportedContent"> 
  </div>  
    <div class="form-inline my-2 my-lg-0">
      <a class="btn btn-outline-info my-2 my-sm-0" role="button" href="{{route('Signup')}}">Sign Up</a>
      <a class="btn btn-outline-success my-2 my-sm-0 ml-2" role="button" href="{{route('Login')}}">Login</a>
    </div>
</nav>