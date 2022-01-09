<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    @foreach ($owners as $owner)
        <a>{{ $owner->NAME}}</a>
        <a>@if (!@empty($owner->car))
            {{ $owner->car->id}} - {{ $owner->car->model}}
        @endif</a>
    @endforeach
</body>
</html>