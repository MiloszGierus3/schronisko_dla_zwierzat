@include('shared.html')

@include('shared.head', ['pageTitle' => 'Wyniki wyszukiwania'])

<body>
    @include('shared.navbar')

    <div class="container mt-4">
        <h1>Wyniki wyszukiwania</h1>
        <div class="col-md-3  text-rigth">
            <form action="{{ route('schronisko.search') }}" method="GET" class="form-inline my-2 my-lg-0 float-md-right">
                <input class="form-control mr-sm-2 " type="search" placeholder="Wyszukaj zwierzaka..." aria-label="Wyszukaj" name="search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Szukaj</button>
            </form>
        </div>
        @if ($zwierzaki->isEmpty())
            <p>Brak wyników dla wyszukiwanej frazy.</p>
        @else
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($zwierzaki as $zwierzak)
                @if (!$zwierzak->status_adopcji)
                    <div class="col d-flex align-items-stretch">
                        <div class="card h-100">
                            <img src="{{ asset('storage/img/' . $zwierzak->img) }}" class="card-img-top" alt="{{ $zwierzak->imię }}">
                            <div class="card-body">
                                <h3 class="card-title text-center">{{ $zwierzak->imię }}</h3>
                                <ul class="list-unstyled">
                                    <li><strong>Gatunek:</strong> {{ $zwierzak->gatunek }}</li>
                                    <li><strong>Wiek:</strong> {{ $zwierzak->wiek }}</li>
                                    <li><strong>Stan zdrowia:</strong> {{ $zwierzak->stan_zdrowia }}</li>
                                    <li><strong>Rasa:</strong> {{ $zwierzak->rasa }}</li>
                                    <li><strong>Miasto:</strong> {{ optional($zwierzak->pochodzenie)->Miasto }}</li>
                                    <li><strong>Rozmiar klatki:</strong> {{ optional($zwierzak->klatki)->rozmiar }}</li>
                                    <li><strong>Imię opiekuna:</strong> {{ optional($zwierzak->opiekunowie)->imię }}</li>
                                </ul>
                            </div>
                
                            
                            <div class="btn-group" role="group" aria-label="Zarządzanie zwierzakiem">
@if(auth()->check())
    @if(auth()->user()->id == 1)
    <a href="{{ route('schronisko.edit', ['id' => $zwierzak->id]) }}" class="btn btn-warning">Edytuj</a>
    <form action="{{ route('schronisko.delete', ['id' => $zwierzak->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Usuń</button>
    </form>
    <!--adoptuj to teraz edit ale ma podobnie działać-->
    <a href="{{ route('schronisko.adoptuj', ['id' => $zwierzak->id]) }}" class="btn btn-success">Adoptuj</a>
    @else
    
    <!--adoptuj to teraz edit ale ma podobnie działać-->
    <a href="{{ route('schronisko.adoptuj', ['id' => $zwierzak->id]) }}" class="btn btn-success">Adoptuj</a>
@endif
@else

@endif


     
</div>
<a href="{{ route('schronisko.show', ['id' => $zwierzak->id]) }}" class="btn btn-primary">Więcej szczegółów zwierzaka</a>
                            <div class="card-footer">
                                <small class="text-muted">Last updated: {{ $zwierzak->updated_at }}</small>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        @endif
    </div>

    @include('shared.footer')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
