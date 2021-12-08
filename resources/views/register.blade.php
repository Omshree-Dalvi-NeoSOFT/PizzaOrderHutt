<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('include.head')
    <title>PizzaHut | PizzaHut</title>
    <style>
        img{
            height: 100px;
            width: 100px;
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <section class="container mt-3">
        @include('include.mainnav')
    </section>
    <section class="jumbotron jumbotron-fluid container mt-3">
        <h1 class="display-4">Register User</h1>
        <p class="lead">Register Yourself for the toure of varities of licious Pizza .</p>
    </section>
    <section class="container">
        @if(Session::has('success'))
            <div class="alert alert-success"> {{Session::get('success')}} </div>
        @endif
        @if(Session::has('errorMsg'))
            <div class="alert alert-success"> {{Session::get('errorMsg')}} </div>
        @endif
        <form method="post" action="{{route('PostSignup')}}">
            @csrf()
            <div class="form-group">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" placeholder="User Name ">
            </div>
            @if ($errors->has('name'))
                <label class="alert alert-danger">{{$errors->first('name')}}</label>
            @endif

            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="User Email ">
            </div>
            @if ($errors->has('email'))
                <label class="alert alert-danger">{{$errors->first('email')}}</label>
            @endif

            <div class="form-group">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="pass" placeholder="User Password ">
            </div>
            @if ($errors->has('pass'))
                <label class="alert alert-danger">{{$errors->first('pass')}}</label>
            @endif

            <div class="form-group">
                <label class="form-label">Mobile</label>
                <input type="text" class="form-control" name="mobile" placeholder="e.g. 8087530465">
            </div>
            @if ($errors->has('mobile'))
                <label class="alert alert-danger">{{$errors->first('mobile')}}</label>
            @endif

            <div class="form-group">
                <label class="form-label">Street Address</label>
                <textarea class="form-control" name="address" rows="3"></textarea>
            </div>
            @if ($errors->has('address'))
                <label class="alert alert-danger">{{$errors->first('address')}}</label>
            @endif

            <div class="col-12">
                <button class="btn btn-success p-2" type="submit" name="sub">Register</button>
            </div>
        </form>
    </section>
</body>
</html>