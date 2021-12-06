<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
     
    <h1>ciao admin!</h1>
    <h3>l'utente {{$user->name}} richiede di diventare revisore</h3>
    {{$usermail =$user->email}}
    <a href="{{route('admin.accept', compact('usermail'))}}" class="btn btn-success">accetta revisore</a>
    {{-- <form target="_blank" action="{{route('admin.acceptRevisor')}}" method="POST">
    @csrf
    <input type="hidden" value="{{$user->email}}" name="email">
    <button type="submit" class="btn btn-warning">accetta revisore</button>
    </form> --}}
    
</body>
</html>