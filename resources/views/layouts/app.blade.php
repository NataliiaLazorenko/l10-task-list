<!DOCTYPE html>
<html>

<head>
    <title>Laravel 10 Task List App</title>
</head>

<body>
    <!-- `yield` shows that here we should render the content of particular section  -->
    <h1>@yield('title')</h1>
    <!-- Here we will render the content of an individual blate template -->
    <div>
        @yield('content')
    </div>
</body>

</html>
