<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('include.head')
    <title>Profile | PizzaHut</title>
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
        <h1>My Profile</h1>
    </section>
    <section class="container mt-4">
    <table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Details</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="col">Name</th>
            <td>{{$details->name}}</td>
        </tr>
        <tr>
            <th scope="col">Email</th>
            <td>{{$details->email}}</td>
        </tr>
        <tr>
            <th scope="col">Mobile No</th>
            <td>{{$details->mobile}}</td>
        </tr>
        <tr>
            <th scope="col">Address</th>
            <td>{{$details->address}}</td>
        </tr>
        <tr>
            <th scope="col">Action</th>
            <td>
                <a href="{{route('MyProfileEdit')}}" class="btn btn-dark">Edit</a>
            </td>
        </tr>
    </tbody>
    </table>

</section>
</body>
</html>