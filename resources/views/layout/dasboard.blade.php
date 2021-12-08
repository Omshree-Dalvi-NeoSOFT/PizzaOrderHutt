<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('include.head')
    <title>Menu | PizzaHut</title>
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
    <section class="container mt-4 ">
        <h1>Menu</h1>
        <div class="row">
            @foreach ( $products as $menu )
            <div class="col-sm-4 mt-2">
                <div class="card" style="width: 21rem;">
                    <img class="card-img-top" src="{{URL::asset('image/'.$menu->image)}}" alt="Card image cap" height="300px">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{$menu->name}}</h5>
                        <a href="{{ route('add.to.cart', $menu->id)}}" class="btn btn-dark mt-4">Add to Cart</a><b class="ml-4 text text-danger mt-5">Rs. {{$menu->price}}</b>
                    </div>
                </div>
            </div>   
            @endforeach
        </div>
    </section>
  
</body>
</html>