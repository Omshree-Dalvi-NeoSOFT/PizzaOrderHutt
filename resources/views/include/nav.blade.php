<nav class="navbar navbar-expand-lg navbar-light bg-light">
<img src="{{ URL::asset('image/logo.png') }}" alt="Pizza-Hut_Logo" class="navbar-brand nbar">
  <div class="collapse navbar-collapse" id="navbarSupportedContent"> 
  </div>  
    <div class="form-inline my-2 my-lg-0">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="{{route('DashBoard')}}">Menu</a>
      <a class="nav-item nav-link" href="{{ route('cart') }}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-dark">{{ count((array) session('cart')) }}</span></a>
      <a class="nav-item nav-link" href="{{route('MyOrder')}}">My Order</a>
      <a class="nav-item nav-link" href="{{route('MyProfile')}}">Profile</a>
    </div>
      <a class="btn btn-outline-danger my-2 my-sm-0 ml-2" role="button" href="{{route('Logout')}}">Logout</a>
    </div>
</nav>