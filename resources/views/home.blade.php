@extends("app")

@section("content")
    <main class="container">
        <div class="row">
            <div class="col-12 align-items-center justify-content-center text-center">
                <h1 class="mt-5">Welcome to CarInventory</h1>
            </div>
            <div class="col-12 align-items-center justify-content-center mt-3">
                <div class="row">
                    <div class="offset-5 col-1">
                        <a href="{{route('cars.list')}}" class="btn btn-primary">
                            <span class="large-font">Cars</span>
                        </a>
                    </div>
                    <div class="col-1">
                        <a href="{{route('parts.list')}}" class="btn btn-primary">
                            <span class="large-font">Parts</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
