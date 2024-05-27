@include('shared.html')

@include('shared.head', ['pageTitle' => 'Zadooptowane Zwierzęta'])

<body>
    
@include('shared.navbar')
 
@if(session('adopt'))
    <div class="alert alert-success text-center">
        {{ session('adopt') }}
    </div>
@endif
@if(session('usun'))
    <div class="alert alert-success text-center">
        {{ session('usun') }}
    </div>
@endif
<div class="container mt-4">
    <h1>Zaadoptowane zwierzęta</h1>

    @if ($zaadoptowaneZwierzeta->isEmpty())
        <p>Brak zaadoptowanych zwierząt.</p>
    @else
        <div class="table-responsive">
            <table class="table  table-bordered table-vertical table-success table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID zwierzaka</th>
                        <th scope="col">Nick Opiekuna po adopcji</th>
                        <th scope="col">Imię</th>
                        <th scope="col">Gatunek</th>
                        <th scope="col">Rasa</th>
                        <th scope="col">Wiek</th>
                        <th scope="col">Stan Zdrowia</th>
                        @if(auth()->check())
                            @if(auth()->user()->id == 1)
                        <th scope="col">Akcje</th> <!-- Dodaj kolumnę na akcje -->
                        @endif
                        @endif    
                    </tr>
                </thead>
                <tbody>
                    @foreach ($zaadoptowaneZwierzeta as $zwierzak)
                        <tr>
                            <td>{{ $zwierzak->id }}</td>
                            <td>{{ optional($zwierzak->user)->name }}</td>
                            <td>{{ $zwierzak->imię }}</td>
                            <td>{{ $zwierzak->gatunek }}</td>
                            <td>{{ $zwierzak->rasa }}</td>
                            <td>{{ $zwierzak->wiek }}</td>
                            <td>{{ $zwierzak->stan_zdrowia }}</td>
                            @if(auth()->check())
                            @if(auth()->user()->id == 1)
                            <td>
                                <form action="{{ route('schronisko.usunAdopcje', ['id' => $zwierzak->id]) }}" method="POST">
                                @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Usuń adopcję</button>
                                </form>
                                    
                            </td>
                            @endif
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

@include('shared.footer')

<!-- Włączamy Bootstrap JavaScript, opcjonalne -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
