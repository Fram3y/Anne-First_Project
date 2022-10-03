<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    {{-- Meow fucker. cry --}}
    <title>Document</title>
</head>
<body style="background-color: aqua">
    @yield('content')
</body>

<div>
    <ul style="list-style: none">
        <li><a href="http://localhost:8000/home">Home</a></li>
        <li><a href="http://localhost:8000/about">About</a></li>
        <li><a href="https://media.tenor.com/CH9a7exGiFIAAAAM/cat-mute.gif">Contact Us</a></li>
    </ul>
    <img src="https://media.tenor.com/CH9a7exGiFIAAAAM/cat-mute.gif" alt="" style="width: 80%;">
</div>

</html>