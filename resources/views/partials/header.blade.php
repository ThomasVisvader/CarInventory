<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('home')}}">CarInventory</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('home')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('cars.list')}}">Cars</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('parts.list')}}">Parts</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
