@extends("app")

@section("content")
    <form action="{{route('cars.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="registration_number" class="form-label">Registration number</label>
            <input type="number" class="form-control" id="registration_number" name="registration_number">
        </div>
        <div class="mb-3 form-check">
            <label class="form-check-label" for="is_registered">Car is registered</label>
            <input type="checkbox" class="form-check-input" id="is_registered" name="is_registered" onclick="checkRegNum()">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

@section('scripts')
    <script src='{{ asset('js/scripts.js') }}' type="text/javascript"></script>
@endsection
