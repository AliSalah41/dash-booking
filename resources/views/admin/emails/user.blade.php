
<html lang="en-US">
<head>
    <meta charset="text/html">
</head>
<body>
    Subject: <p>Hello, {{ $user->name }}!</p>

    Message body:
    {{--  {{ $content }}  --}}
    {!! $content !!}
</body>
</html>
