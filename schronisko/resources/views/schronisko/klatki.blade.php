@include('shared.html')

@include('shared.head', ['pageTitle' => 'Klatki'])

<body>
    <!--Strona z klientami-->
@include('shared.navbar')

<div class="container mt-4 table-responsive">
    <h3 class="">Klatki dla zwierząt w  schronisku</h3>
    <table class="table  table-bordered table-vertical table-success table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">rozmiar</th>
                <th scope="col">opis</th>
              
              
            </tr>
        </thead>
        <tbody>
            @foreach($klatki as $klatka)
            <tr>
                <th scope="row">{{ $klatka->id_klatki }}</th>
                <td>{{ $klatka->rozmiar }}</td>
                <td>{{ $klatka->opis_klatki }}</td>
                
               
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include('shared.footer')

</body>
</html>
