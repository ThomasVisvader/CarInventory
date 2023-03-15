@extends("app")

@section("content")
    <main>
        <form method="get" action="{{route('cars.list')}}">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" @if(isset($filters['name']))value="{{$filters['name']}}"@endif>
            <label class="form-check-label" for="is_registered">Show only registered cars</label>
            <input type="checkbox" class="form-check-input" id="is_registered" name="is_registered" @if(isset($filters['is_registered']) && $filters['is_registered'])checked @endif>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        @foreach($cars as $car)
            <div>
                {{$car->name}}
                <a href="cars/{{$car->id}}/edit">Edit Car</a>
                <form action="{{ route('cars.delete', [$car->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type='submit' class="btn btn-primary">
                        Delete car
                    </button>
                </form>
            </div>
        @endforeach
        <a href="{{route('cars.create')}}">Create a new car</a>
    </main>
@endsection

@section('scripts')
    <script src='{{ asset('js/scripts.js') }}' type="text/javascript"></script>
@endsection
