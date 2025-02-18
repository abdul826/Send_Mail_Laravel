<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$request['subject']}}</title>
</head>
<body>
    {{-- <h3>{{$subject}}</h3>
    <p>{{$mailMessage}}</p>
    <p>{{$name}}</p>
    <p>{{$product}}</p>
    <p>{{$price}}</p> --}}

    <h3>Hello : {{$request['name']}}</h3>
    <p>Email : {{$request['email']}}</p>
    <p>subject : {{$request['subject']}}</p>
    <p>message : {{$request['message']}}</p>
</body>
</html>