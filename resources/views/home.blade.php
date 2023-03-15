@extends("app")

@section("content")
    <div>
        Hello world
    </div>
    <a href="{{ route("cars.list") }}">Cars</a>
    <a href="{{ route("parts.list") }}">Parts</a>
@endsection
