@include('shared.html')

@include('shared.head', ['pageTitle' => 'Dodaj zwierzaka'])

<body>
    
@include('shared.navbar')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="display-4 text-center mb-4">Dodaj zwierzaka</h1>
            <form method="POST" action="{{ route('schronisko.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="imię">Imię:</label>
                    <input type="text" class="form-control @error('imię') is-invalid @enderror" id="imię" name="imię" value="{{ old('imię') }}">
                    @error('imię')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="gatunek">Gatunek:</label>
                    <input type="text" class="form-control @error('gatunek') is-invalid @enderror" id="gatunek" name="gatunek" value="{{ old('gatunek') }}">
                    @error('gatunek')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="wiek">Wiek:</label>
                    <input type="number" class="form-control @error('wiek') is-invalid @enderror" id="wiek" name="wiek" min="0" value="{{ old('wiek') }}">
                    @error('wiek')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                <label for="img">Zdjęcie:</label>
                <input type="file" class="form-control-file @error('img') is-invalid @enderror" id="img" name="img">
                @error('img')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>





                
                <div class="form-group">
                    <label for="stan_zdrowia">Stan zdrowia:</label>
                    <input type="text" class="form-control @error('stan_zdrowia') is-invalid @enderror" id="stan_zdrowia" name="stan_zdrowia" value="{{ old('stan_zdrowia') }}"  title="Dozwolone są tylko litery i spacje">
                    @error('stan_zdrowia')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="rasa">Rasa:</label>
                    <input type="text" class="form-control @error('rasa') is-invalid @enderror" id="rasa" name="rasa" value="{{ old('rasa') }}"  title="Dozwolone są tylko litery i spacje">
                    @error('rasa')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <!--dodawanie opiekuna zwierzaka                 nowe do pokazania-->
                <div class="form-group">
                <label for="opiekun_id">Opiekun:</label>
                <select class="form-control" id="opiekun_id" name="opiekun_id">
    @foreach (App\Models\Opiekunowie::all() as $opiekun)
        <option class="font-weight-bold" value="{{ $opiekun->opiekun_id }}" >{{ $opiekun->imię }} {{ $opiekun->nazwisko }}  </option>
    @endforeach
</select>
</div>
            <!--dodawanie rozmiari kaltki-->
            <div class="form-group">
                <label for="id_klatki">Klatka:</label>
                <select class="form-control" id="id_klatki" name="id_klatki">
    @foreach (App\Models\klatki::all() as $klatka)
        <option class="font-weight-bold" value="{{ $klatka->id_klatki }}">{{ $klatka->rozmiar }}  -  {{ $klatka->opis_klatki }} </option>
    @endforeach
</select>
</div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Dodaj zwierzaka</button>
                </div>
                
                
            </form>
        </div>
    </div>
</div>

@include('shared.footer')

</body>
</html>
