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
    <section class="container mt-3">
        <div class="jumbotron">
            <h1 class="display-4">Pizza Delivery !</h1>
            <p class="lead">Welcome to pizza delivery service. This is the place from where you can choose the most delicious pizza you like from wide variety of options !</p>
            <hr class="my-4">
            <p>Free Delivery Availabe on order above Rs. 200.</p>
            <p class="lead">
                <a class="btn btn-dark btn-lg col-12" href="{{route('Signup')}}" role="button">Sign In and Order</a>
            </p>
        </div>
    </section>
@include('include.foot')
</body>
</html>