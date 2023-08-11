<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Create a Product</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error) 
            
                <li>{{$error}}</li>

            @endforeach

        </ul>
        @endif
    </div>
    <form method="post" action="{{route('product.store')}}">
        @csrf
        @method('post')
        <div>
            <label>Name</label>
            <input type="text" name="name" id="name" placeholder="product's name" />
        </div>
        <div>
            <label>Quantity</label>
            <input type="text" name="qty" id="qty" placeholder="product's quantity" />
        </div>
        <div>
            <label>Price</label>
            <input type="text" name="price" id="price" placeholder="product's price" />
        </div>
        <div>
            <label>description</label>
            <input type="text" name="description" id="description" placeholder="product's description" />
        </div>
        <div>
            <input type="submit" value="Submit product" />
        </div>
    </form>

</body>

</html>