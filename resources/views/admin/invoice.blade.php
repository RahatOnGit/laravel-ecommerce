<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   <center>
    <h1 >customer name: {{$data->name}}</h1>
    <h1 >customer address: {{$data->rec_address}}</h1>
    <h1>customer phone no. : {{$data->phone}}</h1>
    <h1>product title: {{$data->product->title}}</h1>
    <h1>product price: {{$data->product->price}}</h1>



   </center>
</body>
</html>