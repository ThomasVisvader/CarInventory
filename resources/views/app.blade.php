<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include("partials.head")
<body>
@include("partials.header")
@yield("content")
@include("partials.footer")
@yield("scripts")
</body>
</html>
