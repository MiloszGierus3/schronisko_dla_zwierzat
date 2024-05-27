@include('shared.html')

@include('shared.head', ['pageTitle' => 'Schronisko'])
<body>
    
   @include('shared.navbar')

    <!-- Treść główna -->
    <div class="container mt-4 ">
    <div class="jumbotron" style="background-color: #FF9933; color: white; padding: 2rem; border-radius: 15px;">

            <h1 class="display-4">Witaj w moim Schronisku!</h1>
            <p class="lead">Moja strona ma na celu zapewnienie możliwości opieki nad zwierzętami z schroniska.
                Logując się możesz adoptować zwierzaka z schroniska zapewniając mu nowy dom i opiekę. 
                Przeglądając zwierzęta które są u nas wybierzesz tego który tobie się najbardziej podoba. 
                W schronisku znajduję się dużo zwierząt (zdrowych/chorych) które potrzebują opiekuna zobacz je wszystkie i wybierz którego chciałbyś przygarnąć
            
            </p>
            <hr class="my-4">
            <p><strong>Adoptując zwierzaka, możesz dać mu nowy dom i miłość, której potrzebuje.</strong></p>
            <a class="btn btn-primary btn-lg" href="{{ url('/zwierzeta') }}" role="button">Zobacz wszystkie zwierzęta</a>
        </div>
        @if(auth()->check())
    @if(auth()->user()->id == 1)
    <div class="alert alert-info" role="alert">
        Jesteś Zalogowany jako <strong>{{ auth()->user()->name }}</strong>, możesz teraz zarządać zwierzętami w schronisku!!!! 
        </div>
    @else
    <div class="alert alert-info" role="alert">
    Jesteś Zalogowany jako <strong>{{ auth()->user()->name }}</strong>, możesz teraz adoptować zwierzaka!!!! Oraz korzystać z strony <strong><em>w lepszej okazałości!</em></strong>
        </div>
    @endif
    @else
    <div class="alert alert-info" role="alert">
        <a class="link" href="{{ url('/login') }}"><strong>Zaloguj</a></strong> się lub  
        <a class="link" href="{{ url('/rejstracja') }}"><strong>Zarejestruj</a></strong>, aby rozpocząć adopcję zwierzaka, oraz móc korzystac z strony <strong><em> w lepszej okazałości!</em></strong>
        </div>
    @endif
    </div>


    <h2 class="text-center">Przykładowe zwierzęta w naszym schronisku</h2>
    

    <div class="row row-cols-1 row-cols-md-3 g-4">
    @forelse($random as $zwierz)
    @if (!$zwierz->status_adopcji)
        <div class="col d-flex align-items-stretch">
            <div class="card h-100">
                <img src="{{ asset('storage/img/' . $zwierz->img) }}" class="card-img-top" alt="{{ $zwierz->imię }}">
                <div class="card-body">
                    <h3 class="card-title text-center">{{ $zwierz->imię }}</h3>
                    <ul class="list-unstyled">
                    <li><strong>Gatunek:</strong> {{ $zwierz->gatunek }}</li>
                    <li><strong>Wiek:</strong> {{ $zwierz->wiek }}</li>
                    <li><strong>Stan zdrowia:</strong> {{ $zwierz->stan_zdrowia }}</li>
                    <li><strong>Rasa:</strong> {{ $zwierz->rasa }}</li>
                    <li><strong>Miasto:</strong> {{ optional($zwierz->pochodzenie)->Miasto }}</li>
                    <li><strong>Rozmiar klatki:</strong> {{ optional($zwierz->klatki)->rozmiar }}</li>
                    <li><strong>Imię opiekuna:</strong> {{ optional($zwierz->opiekunowie)->imię }}</li><br>
                    <a href="{{ route('schronisko.show', ['id' => $zwierz->id]) }}" class="btn btn-primary">Więcej szczegółów zwierzaka</a>
                </ul>
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

    <!-- Stopka -->
    @include('shared.footer')

    <!-- Włączamy Bootstrap JavaScript, opcjonalne -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

