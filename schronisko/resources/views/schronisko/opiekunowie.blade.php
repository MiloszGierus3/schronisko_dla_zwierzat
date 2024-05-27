@include('shared.html')

@include('shared.head', ['pageTitle' => 'Opiekunowie'])

<body>
    
@include('shared.navbar')

<div class="container mt-4  table-responsive">
    <h3 class="">Opiekunowie zwierząt w schronisku</h3>
    <table class="table  table-bordered table-vertical table-success table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Imię</th>
                <th scope="col">Nazwisko</th>
                <th scope="col">Wiek</th>
                <th scope="col">Telefon</th>
                <!-- Dodaj dowolne inne kolumny według potrzeb -->
            </tr>
        </thead>
        <tbody>
            @foreach($opiekunowie as $opiekun)
            <tr>
                <th scope="row">{{ $opiekun->opiekun_id }}</th>
                <td>{{ $opiekun->imię }}</td>
                <td>{{ $opiekun->nazwisko }}</td>
                <td>{{ $opiekun->wiek }}</td>
                <td>{{ $opiekun->telefon }}</td>
                <!-- Dodaj dowolne inne komórki w każdym wierszu według potrzeb -->
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include('shared.footer')

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
