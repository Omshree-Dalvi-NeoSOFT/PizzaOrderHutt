<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('include.head')
    <title>Checkout | PizzaHut</title>
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
        <h1>Checkout</h1>
    </section>
    <section class="container mt-4">
        <form action="{{route('PostOrder')}}" method="post">
            @csrf()
            <div class="form-group">
                <label class="form-label">Credit Card</label>
                <input type="text" class="form-control" name="ccdetail" placeholder="Credit Card Number e.g. XXXX-XXXX-XXXX-1111"/>
            </div>
            <div class="form-group">
                <strong class="text">Total : Rs. {{$total}}</strong>
                <input type="hidden" value="{{$total}}" name="total"/>
            </div>
            <div>
            <button class="btn btn-dark p-2" type="submit" name="sub">Checkout  <i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i></button>
            </div>
        </form>
    </section>


</body>
</html>