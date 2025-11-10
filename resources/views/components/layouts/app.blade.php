<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link href="https://www.nerdfonts.com/assets/css/webfont.css" rel="stylesheet" type="text/css" />
    @vite(['resources/styles/app.scss', 'resources/scripts/app.js'])
</head>

<body class="{{ session('body-class', 'dark') }}">
    {{ $slot }}
</body>

</html>
