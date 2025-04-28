<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - @yield('title', 'Home')</title>
</head>
<body>
    <div>
        @if (session('success'))
            <div style="background-color: #d4edda; padding: 10px; margin-bottom: 15px;">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>
