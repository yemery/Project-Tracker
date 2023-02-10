<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/css/Project/create.css') }}">
</head>

<body>
    <x-sidebar />
    <div class="content">
        <div class="row">
            <a href="{{ url('projects') }}">
                <img src="/images/go-back-icon.svg" alt="arrow">
                Go Back
            </a>
            <div class="title">Create a New Project</div>
        </div>
        <form action="{{ route('projects.store') }}" method="post">
            @csrf
            <div class="input-div">
                <label>Project Title</label>
                <input type="text" name="title">
            </div>
            <input type="submit" value="Create A New Project">
        </form>
    </div>
</body>

</html>
