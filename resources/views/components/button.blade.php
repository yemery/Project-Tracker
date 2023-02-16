<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/Components/buttons.css') }}">

</head>
<body>
        @if ($object =="")
            <a href="{{ route($href) }}">{{$slot}}</a>

            
        @else
        @if ($slot == 'edit')
                <a href="{{ route($href,$object) }}" style="background-color: {{$bgcolor}} ; 
    width: 62px;
    height: 23px;
    cursor: pointer;
    color: white;
    font-family: 'Rubik';
    border-radius: 6px;
    border: none;"
    >{{$slot}}</a>

        @else
                <a href="{{ route($href,$object) }}" >{{$slot}}</a>

        @endif

        @endif
</body>
</html>