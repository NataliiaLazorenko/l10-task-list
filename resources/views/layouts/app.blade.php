<!DOCTYPE html>
<html>

<head>
    <title>Laravel 10 Task List App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @yield('styles')
</head>

<!-- Class 'container' creates a centered container with a max width that adjusts based on the screen size.
mx-auto horizontally centers the element within the container.
mt-10 and mb-10 add a margin of 10 units to the top and bottom, respectively. The unit is defined by Tailwind's spacing scale.
max-w-lg sets the maximum screen size to large, which equals 32 REM or 512 pixels -->

<body class="container mx-auto mt-10 mb-10 max-w-lg">
    <!-- `yield` shows that here we should render the content of particular section  -->
    <h1 class="mb-4 text-2xl">@yield('title')</h1>
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