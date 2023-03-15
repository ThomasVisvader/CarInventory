@extends("app")

@section("content")
    <main class="container">
        <h1 class="mb-5">List of cars</h1>
        <form method="get" action="{{route('cars.list')}}">
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
                        <div class="col-4 pt-4 text-center">
                            <label class="form-check-label" for="is_registered">Show only registered cars</label>
                            <input type="checkbox" class="form-check-input" id="is_registered" name="is_registered" @if(isset($filters['is_registered']) && $filters['is_registered'])checked @endif>
                        </div>
                        <div class="col-4 pt-4 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="row my-5 align-item-center justify-content-center">
            <div class="col-2">
                <a href="{{route('cars.create')}}" class="btn btn-info">Create a new car</a>
            </div>
        </div>
        <div class="row products-list">
            <div class="row">
                @foreach($cars as $car)
                    <div class="row listing my-4 mx-2">
                        <div class="col-4 mb-4">
                            {{$car->name}}
                        </div>
                        <div class="col-2">
                            <a href="cars/{{$car->id}}/edit" class="btn btn-primary">Edit car</a>
                        </div>
                        <div class="col-2">
                            <form action="{{ route('cars.delete', [$car->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type='submit' class="btn btn-danger">
                                    Delete car
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    <script src='{{ asset('js/scripts.js') }}' type="text/javascript"></script>
@endsection
