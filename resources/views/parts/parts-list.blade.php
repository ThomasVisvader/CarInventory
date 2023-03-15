@extends("app")

@section("content")
    <main>
        <form method="get" action="{{route('parts.list')}}">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" @if(isset($filters['name']))value="{{$filters['name']}}"@endif>
            <label for="car_id" class="form-label">Car</label>
            <select class="form-select" aria-label="Choose a car" name="car_id">
                <option selected disabled>Choose a car</option>
                @foreach($cars as $car)
                    <option value="{{$car->id}}">{{$car->name}}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        @foreach($parts as $part)
            <div>
                {{$part->name}}
                <a href="parts/{{$part->id}}/edit">Edit Part</a>
                <form action="{{ route('parts.delete', [$part->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type='submit' class="btn btn-primary">
                        Delete part
                    </button>
                </form>
            </div>
        @endforeach
        <a href="{{route('parts.create')}}">Create a new part</a>
    </main>
@endsection
