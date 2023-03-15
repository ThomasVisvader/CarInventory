@extends("app")

@section("content")
    <main class="container">
        <h1 class="mb-5">Edit a car</h1>
        <form action="{{route('cars.update', ['car' => $car->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-6 mb-3">
                    <label for="name" class="form-label">Name<span class="req">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$car->name}}" maxlength="128" required>
                </div>
            </div>
            <div class="row">
                <div class="col-6 mb-3">
                    <label for="registration_number" class="form-label d-flex">Registration number<span class="d-none" id="star">*</span></label>
                    <input type="number" class="form-control" id="registration_number" value="{{$car->registration_number}}" name="registration_number">
                </div>
            </div>
            <div class="row">
                <div class="col-6 mb-3 mx-3 form-check">
                    <label class="form-check-label" for="is_registered">Car is registered</label>
                    <input type="checkbox" class="form-check-input" id="is_registered" name="is_registered" onclick="checkRegNum()" @if($car->is_registered) checked @endif>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </main>
@endsection

@section('scripts')
    <script src='{{ asset('js/scripts.js') }}' type="text/javascript"></script>
@endsection
