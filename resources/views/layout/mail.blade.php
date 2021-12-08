<table class="table ml-5">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Details</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="col">Order Id</th>
            <td>{{$order->id}}</td>
        </tr>
        <tr>
            <th scope="col">Card Details</th>
            <td>{{$order->ccdetails}}</td>
        </tr>
        <tr>
            <th scope="col">Total Amount</th>
            <td><b class="text text-danger">{{$order->total}}</b></td>
        </tr>
        <tr>
            <th scope="col">Product Details</th>
            <td>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>Product Quantity</th>
                            <th>Product Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderproducts as $prod )
                        <tr>
                            <td><img src="{{ URL::asset('image/'.$prod['imae']) }}" height="100px"></td>
                            <td>{{$prod["pname"]}}</td>
                            <td>{{$prod["quantity"]}}</td>
                            <td>{{$prod["price"]}}</td>
                        </tr>                            
                        @endforeach
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <!-- <th scope="col">Action</th>
            <td>
                <a href="" class="btn btn-dark">Edit</a> | <a href="" class="btn btn-dark">Delete</a>
            </td> -->
        </tr>
    </tbody>
    </table>

    <hr>
    <h2>Thanks & Regards</h2>
    <h3>PizzaHut.com</h3>