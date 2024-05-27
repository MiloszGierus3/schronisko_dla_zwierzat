@include('shared.html')

@include('shared.head', ['pageTitle' => 'Zwierzeta'])

<body>
    @include('shared.navbar')

    <div id="zwierzaka" class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center mb-4">Zwierzaki</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            
            <div class="col-12 col-sm-6 col-lg-4 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('storage/img/' . $zwierz->img) }}" class="card-img-top" alt="{{ $zwierz->imię }}">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ $zwierz->imię }}</h5>
                        <ul class="list-unstyled">
                            <li><strong>Gatunek:</strong> {{ $zwierz->gatunek }}</li>
                            <li><strong>Wiek:</strong> {{ $zwierz->wiek }}</li>
                            <li><strong>Stan zdrowia:</strong> {{ $zwierz->stan_zdrowia }}</li>
                            <li><strong>Rasa:</strong> {{ $zwierz->rasa }}</li>
                            <li><strong>Miasto pochodzenia zwierzaka:</strong> {{ optional($zwierz->pochodzenie)->Miasto }} {{ optional($zwierz->pochodzenie)->numer_ulicy }}</li>
                            <li><strong>Rozmiar klatki:</strong> {{ optional($zwierz->klatki)->rozmiar }}</li>
                            <li><strong>Opiekun:</strong> {{ optional($zwierz->opiekunowie)->imię }} {{ optional($zwierz->opiekunowie)->nazwisko }}</li>
                            <li><strong>Telefon opiekuna:</strong> {{ optional($zwierz->opiekunowie)->telefon }}</li>
                            <li><strong>Opis klatki:</strong> {{ optional($zwierz->klatki)->opis_klatki }}</li>
                        </ul>
                    </div>
                    
                    <div class="card-footer">
                        <div class="row justify-content-center">
                        @if(auth()->check())
                        @if(auth()->user()->id == 1)
                            <div class="col-md-6 text-center">
                            <a href="{{ route('schronisko.adoptuj', ['id' => $zwierz->id]) }}" class="btn btn-success">Adoptuj</a>
                            </div>
                        @else
                        <div class="col-md-6 text-center">
                            <a href="{{ route('schronisko.adoptuj', ['id' => $zwierz->id]) }}" class="btn btn-success">Adoptuj</a>
                            </div>
                        @endif
                        @else
                        <div class="col-md-6 text-center">
                            <strong><a href="{{ url('/login') }}">Zaloguj się</a> aby adoptować</strong>
                            </div>
                        @endif    
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>

    @include('shared.footer')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
