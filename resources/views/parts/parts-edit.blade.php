@extends("app")

@section("content")
    <main class="container">
        <h1 class="mb-5">Edit a car</h1>
        <form action="{{route('parts.update', ['part' => $part->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-6 mb-3">
                    <label for="name" class="form-label">Name<span class="req">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$part->name}}" required>
                </div>
            </div>
            <div class="row">
                <div class="col-6 mb-3">
                    <label for="serial_number" class="form-label">Serial number<span class="req">*</span></label>
                    <input type="number" class="form-control" id="serial_number" name="serial_number" value="{{$part->serial_number}}" required>
                </div>
            </div>
            <div class="row">
                <div class="col-6 mb-3">
                    <label for="car_id" class="form-label">Car</label>
                    <select class="form-select" aria-label="Choose a car" name="car_id" required>
                        <option selected disabled>Choose a car</option>
                        @foreach($cars as $car)
                            <option value="{{$car->id}}" @if($car->id === $part->car_id) selected @endif>{{$car->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </main>
@endsection

@section('scripts')
    <script src='{{ asset('js/scripts.js') }}' type="text/javascript"></script>
@endsection
