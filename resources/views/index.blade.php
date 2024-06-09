<div>
    Hello, I'm a blade template!
</div>

<!--
    To access the variable we use double curly braces and $ before the variable name
    `isset()` - checks if certain variable is defined. It should be closed with `endisset`
-->
@isset($name)
<div>
    The name is: {{ $name }}
</div>
@endisset