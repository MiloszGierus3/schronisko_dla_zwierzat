@include('shared.html')

@include('shared.head', ['pageTitle' => 'Zwierzęta'])

<body>
    
@include('shared.navbar')
@if(session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif
@if(session('delete'))
    <div class="alert alert-success text-center">
        {{ session('delete') }}
    </div>
@endif

    <!-- Treść główna -->
    <div class="container mt-4">
    <h1 class="">Zwierzęta</h1>
    <div class="row">
    @if(auth()->check())
    @if(auth()->user()->id == 1)
        <div class="col-md-6 mb-3">
            <a href="{{ route('schronisko.dodaj') }}" class="btn btn-success">Dodaj zwierzaka</a>
        </div>
        <div class="col-md-6 mb-3 text-center">
            <form action="{{ route('schronisko.search') }}" method="GET" class="form-inline my-2 my-lg-0 float-md-right">
                <input class="form-control mr-sm-2 " type="search" placeholder="Wyszukaj zwierzaka..." aria-label="Wyszukaj" name="search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Szukaj</button>
            </form>
        </div>
    
        @else
        <div class="col-md-6 mb-3">
            <a href="{{ route('schronisko.dodaj') }}" class="btn btn-success disabled">Dodaj zwierzaka</a>
        </div>
        <div class="col-md-6 mb-3 text-center">
            <form action="{{ route('schronisko.search') }}" method="GET" class="form-inline my-2 my-lg-0 float-md-right">
                <input class="form-control mr-sm-2 " type="search" placeholder="Wyszukaj zwierzaka..." aria-label="Wyszukaj" name="search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Szukaj</button>
            </form>
        </div>
    
        @endif
        @else
        <div class="col-md-6 mb-3">
            <a href="{{ route('schronisko.dodaj') }}" class="btn btn-success disabled">Dodaj zwierzaka</a>
        </div>
        <div class="col-md-6 mb-3 text-center">
            <form action="{{ route('schronisko.search') }}" method="GET" class="form-inline my-2 my-lg-0 float-md-right">
                <input class="form-control mr-sm-2 " type="search" placeholder="Wyszukaj zwierzaka..." aria-label="Wyszukaj" name="search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Szukaj</button>
            </form>
        </div>
@endif

</div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
        
    @forelse($zwierzaki as $zwierz)
    @if (!$zwierz->status_adopcji)
        <div class="col d-flex align-items-stretch">
            <div class="card h-100">
                <img src="{{ asset('storage/img/' . $zwierz->img) }}" class="card-img-top" alt="{{ $zwierz->imię }}">
                <div class="card-body">
                    <h5 class="card-title text-center">{{ $zwierz->imię }}</h5>
                    <ul class="list-unstyled">
                    <li><strong>Gatunek:</strong> {{ $zwierz->gatunek }}</li>
                    <li><strong>Wiek:</strong> {{ $zwierz->wiek }}</li>
                    <li><strong>Stan zdrowia:</strong> {{ $zwierz->stan_zdrowia }}</li>
                    <li><strong>Rasa:</strong> {{ $zwierz->rasa }}</li>
                    <li><strong>Miasto:</strong> {{ optional($zwierz->pochodzenie)->Miasto }}</li>
                    <li><strong>Rozmiar klatki:</strong> {{ optional($zwierz->klatki)->rozmiar }}</li>
                    <li><strong>Imię opiekuna:</strong> {{ optional($zwierz->opiekunowie)->imię }}</li>
</ul>

<div class="btn-group" role="group" aria-label="Zarządzanie zwierzakiem">
@if(auth()->check())
    @if(auth()->user()->id == 1)
    <a href="{{ route('schronisko.edit', ['id' => $zwierz->id]) }}" class="btn btn-warning">Edytuj</a>
    <form action="{{ route('schronisko.delete', ['id' => $zwierz->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Usuń</button>
    </form>
    <!--adoptuj to teraz edit ale ma podobnie działać-->
    <a href="{{ route('schronisko.adoptuj', ['id' => $zwierz->id]) }}" class="btn btn-success">Adoptuj</a>
    @else
    
    <!--adoptuj to teraz edit ale ma podobnie działać-->
    <a href="{{ route('schronisko.adoptuj', ['id' => $zwierz->id]) }}" class="btn btn-success">Adoptuj</a>
@endif
@else

@endif


     
</div>
                
                <a href="{{ route('schronisko.show', ['id' => $zwierz->id]) }}" class="btn btn-primary">Więcej szczegółów zwierzaka</a>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated: {{ $zwierz->updated_at }}</small>
                </div>
            </div>
        </div>
        @endif
        
    @empty
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">BRAK ZWIERZĄT</h5>
                </div>
            </div>
        </div>
    @endforelse
</div>
    </div>


    



    
    <!-- Stopka -->
  @include('shared.footer')

    <!-- Włączamy Bootstrap JavaScript, opcjonalne -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
