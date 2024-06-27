<!DOCTYPE html>
<html>

<head>
    <title>Laravel 10 Task List App</title>
    @yield('styles')
</head>

<body>
    <!-- `yield` shows that here we should render the content of particular section  -->
    <h1>@yield('title')</h1>
    <!-- Here we will render the content of an individual blate template -->
    <div>
        <!-- The best place to display a Flash message is inside the layout, so it's displayed at the top of the page.
        We can use the session() function which is available both in Blade and in Laravel code.
        It has a method has() which lets us check if certain variable exists inside the session.
        To get the value of the variable, we simply call the session function with the name of the variable. -->
        @if(session()->has('success'))
            <div>{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>
</body>

</html>
