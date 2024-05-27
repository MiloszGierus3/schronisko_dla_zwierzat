@include('shared.html')

@include('shared.head', ['pageTitle' => 'Edytuj zwierzaka'])

<body>
    
@include('shared.navbar')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="display-4 text-center mb-4">Edytuj zwierzaka</h1>
            <form method="POST" action="{{ route('schronisko.update', ['zwierzak' => $zwierzak->id]) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="imię">Imię:</label>
                    <input type="text" class="form-control @error('imię') is-invalid @enderror" id="imię" name="imię" value="{{ old('imię', $zwierzak->imię) }}">
                    @error('imię')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="gatunek">Gatunek:</label>
                    <input type="text" class="form-control @error('gatunek') is-invalid @enderror" id="gatunek" name="gatunek" value="{{ old('gatunek', $zwierzak->gatunek) }}">
                    @error('gatunek')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="wiek">Wiek:</label>
                    <input type="number" class="form-control @error('wiek') is-invalid @enderror" id="wiek" name="wiek" min="0" value="{{ old('wiek', $zwierzak->wiek) }}">
                    @error('wiek')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="stan_zdrowia">Stan zdrowia:</label>
                    <input type="text" class="form-control @error('stan_zdrowia') is-invalid @enderror" id="stan_zdrowia" name="stan_zdrowia" value="{{ old('stan_zdrowia', $zwierzak->stan_zdrowia) }}">
                    @error('stan_zdrowia')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="rasa">Rasa:</label>
                    <input type="text" class="form-control @error('rasa') is-invalid @enderror" id="rasa" name="rasa" value="{{ old('rasa', $zwierzak->rasa) }}">
                    @error('rasa')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
<!--edycja opiekuna-->
                <div class="form-group">
                <label for="opiekun_id">Opiekun:</label>
                <select class="form-control" id="opiekun_id" name="opiekun_id">
    @foreach (App\Models\Opiekunowie::all() as $opiekun)
    <option class="font-weight-bold" value="{{ $opiekun->opiekun_id }}" @if($opiekun->opiekun_id == old('opiekun_id', $zwierzak->opiekun_id)) selected @endif>{{ $opiekun->imię }} {{ $opiekun->nazwisko }}</option>
    @endforeach
</select>
</div>
<!--edycja klatki-->
<div class="form-group">
                <label for="id_klatki">Klatka:</label>
                <select class="form-control" id="id_klatki" name="id_klatki">
    @foreach (App\Models\klatki::all() as $klatka)
    <option class="font-weight-bold" value="{{ $klatka->id_klatki }}" @if($klatka->id_klatki == old('id_klatki', $zwierzak->id_klatki)) selected @endif> {{ $klatka->rozmiar }} - {{ $klatka->opis_klatki }}</option>
  @endforeach
</select>
</div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Edytuj</button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('shared.footer')

</body>
</html>
