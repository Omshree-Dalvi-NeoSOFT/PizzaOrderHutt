<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('include.head')
    <title>Edit | PizzaHut</title>
    <style>
        .nbar{
            height: 80px;
            width: 80px;
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <section class="container-fluid">
        @include('include.nav')
    </section>
    <section class="container mt-4">
        <h1>Edit Profile</h1>
    </section>
    <section class="container">
        @if(Session::has('success'))
            <div class="alert alert-success"> {{Session::get('success')}} </div>
        @endif
        @if(Session::has('errorMsg'))
            <div class="alert alert-success"> {{Session::get('errorMsg')}} </div>
        @endif
        <form method="post" action="{{route('PostEditProfile')}}">
            @csrf()
            <input type="hidden" name="id" value="{{$detail->id}}"/>
            <div class="form-group">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" placeholder="User Name " value="{{$detail->name}}">
            </div>
            @if ($errors->has('name'))
                <label class="alert alert-danger">{{$errors->first('name')}}</label>
            @endif

            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="User Email " value="{{$detail->email}}">
            </div>
            @if ($errors->has('email'))
                <label class="alert alert-danger">{{$errors->first('email')}}</label>
            @endif

            <div class="form-group">
                <label class="form-label">Mobile</label>
                <input type="text" class="form-control" name="mobile" placeholder="e.g. 8087530465" value="{{$detail->mobile}}">
            </div>
            @if ($errors->has('mobile'))
                <label class="alert alert-danger">{{$errors->first('mobile')}}</label>
            @endif

            <div class="form-group">
                <label class="form-label">Street Address</label>
                <textarea class="form-control" name="address" rows="3">{{$detail->address}}</textarea>
            </div>
            @if ($errors->has('address'))
                <label class="alert alert-danger">{{$errors->first('address')}}</label>
            @endif

            <div class="col-12">
                <button class="btn btn-dark p-2" type="submit" name="sub">Update Me</button>
            </div>
        </form>
    </section>
</body>
</html>