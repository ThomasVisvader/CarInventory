@extends("app")

@section("content")
    <form action="{{route('parts.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="serial_number" class="form-label">Serial number</label>
            <input type="number" class="form-control" id="serial_number" name="serial_number" required>
        </div>
        <div class="mb-3">
            <label for="car_id" class="form-label">Car</label>
            <select class="form-select" aria-label="Choose a car" name="car_id" required>
                <option selected disabled>Choose a car</option>
                @foreach($cars as $car)
                    <option value="{{$car->id}}">{{$car->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

@section('scripts')
    <script src='{{ asset('js/scripts.js') }}' type="text/javascript"></script>
@endsection