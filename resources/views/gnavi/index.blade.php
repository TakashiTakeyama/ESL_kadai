<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>ぐるなび</h1>
@foreach ($json as $value)
    @if ($value->type == 1)
        @continue
    @endif

    <li>{{ $value->name }}</li>

    @if ($value->number == 5)
        @break
    @endif
@endforeach
</body>
</html>
