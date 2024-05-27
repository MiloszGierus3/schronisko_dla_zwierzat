<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #FF7F00; ">
        <a class="navbar-brand" href="{{ url('/') }}">Schronisko</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="btn btn-outline-primary" href="{{ url('/') }}">Strona główna</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-success" href="{{ url('/zwierzeta') }}">Zwierzęta</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-success" href="{{ url('/opiekunowie') }}">Opiekunowie</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-success" href="{{ url('/klatki') }}">Klatki</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-success" href="{{ url('/zwierzeta/zaadoptowane') }}">Adoptowane zwierzęta w schronisku</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">

            <!--Logowanie po zalogowaniu ma się wyswietlić nazwa użytkownika-->
            @if(auth()->check())
    <li class="nav-item">
        <span class="nav-link text-light bg-dark">Zalogowany jako: {{ auth()->user()->name }}</span>
    </li>
    <li class="nav-item">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-danger nav-link">Wyloguj</button>
        </form>
    </li>

@else
    <li class="nav-item">
        <a class="btn btn-primary" href="{{ url('/login') }}" style="margin-right: 10px;">Zaloguj</a>
    </li>
@endif
                <li class="nav-item">
                <a class="btn btn-primary" href="{{ url('/rejstracja') }}">Zarejestruj</a>
                </li>
            </ul>
        </div>
    </nav>