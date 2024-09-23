<!DOCTYPE html>
<html>

<head>
    <title>Laravel 10 Task List App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- To extract a long list of classes into a reusable class, add a style block in our layout file (app.blade.php) below the Tailwind script.
    We need to add comment to prevent the Blade formatter from reformatting the CSS, as it’s not entirely valid CSS and is parsed by the Tailwind Play CDN.
    If we save changes without the comment, the formatter will break it.
    So we add the comment at the beginning to disable the Blade formatter for the block and wright after the styles to enable it again -->

    {{-- blade-formatter-disable --}}
    <style type="text/tailwindcss">
        .btn {
            /* To apply multiple classes to a single element or class in Tailwind, use the @apply directive followed by the list of classes
            Now, in the template, we can simply use the btn class */
            /* Pseudo-classes can be used in Tailwind. For example, hover:bg-slate-50 - changes the background to a very light gray on hover.
            Each additional class applied must have its own separate hover pseudo-class  */
            @apply rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50
        }

        .link {
            @apply font-medium text-gray-700 underline decoration-pink-500
        }
    </style>
    {{-- blade-formatter-enable --}}

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