@extends("app")

@section("content")
    <main class="container">
        <h1 class="mb-5">List of parts</h1>
        <form method="get" action="{{route('parts.list')}}">
            <div class="row mb-5 align-items-center justify-content-center filters-container">
                <div class="col-12 text-center mt-2">
                    <h3>Filters</h3>
                </div>
                <div class="col-12">
                    <div class="row mb-3">
                        <div class="col-4">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" @if(isset($filters['name']))value="{{$filters['name']}}"@endif>
                        </div>
                        <div class="offset-1 col-4">
                            <label for="car_id" class="form-label">Car</label>
                            <select class="form-select" aria-label="Choose a car" name="car_id">
                                <option selected disabled>Choose a car</option>
                                @foreach($cars as $car)
                                    <option value="{{$car->id}}">{{$car->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="offset-1 col-2 pt-4 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="row my-5 align-item-center justify-content-center">
            <div class="col-2">
                <a href="{{route('parts.create')}}" class="btn btn-info">Create a new part</a>
            </div>
        </div>
        <div class="row products-list">
            <div class="row">
                @foreach($parts as $part)
                    <div class="row listing my-4 mx-2">
                        <div class="col-4 mb-4">
                            {{$part->name}}
                        </div>
                        <div class="col-2">
                            <a href="parts/{{$part->id}}/edit" class="btn btn-primary">Edit part</a>
                        </div>
                        <div class="col-2">
                            <form action="{{ route('parts.delete', [$part->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type='submit' class="btn btn-danger">
                                    Delete part
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
