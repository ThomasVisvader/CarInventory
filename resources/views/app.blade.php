<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include("partials.head")
<body>
@include("partials.header")
@yield("content")
@yield("scripts")
</body>
</html>
