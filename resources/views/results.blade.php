<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/card.css') }}">
    <title>Resultados de Juguetes</title>
</head>
<body>
    <div class="container my-5">
        <h3 class="results-header">Hola **{{ htmlspecialchars($searchName) }}**, estos son los juguetes que te recomendamos 🎁</h3>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">

            @foreach ($arrToys as $juguete)
                <div class="col">
                    <form action="{{ route('toys.mail') }}" method="GET" class="card toy-card h-100">

                        <div class="card-img-wrapper">
                            <img class="card-img-top" src="{{ asset('img/' . $juguete->url) }}" alt="{{ $juguete->toy_name }}">
                        </div>

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $juguete->toy_name }}</h5>

                            <div class="price-container">
                                <p class="card-text toy-price">${{ number_format($juguete->toy_price, 2) }}</p>
                            </div>

                            <button type="submit" class="btn btn-primary mt-auto send-mail-btn">Enviar por Correo</button>

                        </div>

                        <input type="hidden" name="toy_name" value="{{ $juguete->toy_name }}">
                        <input type="hidden" name="toy_price" value="{{ $juguete->toy_price }}">
                        <input type="hidden" name="url" value="{{ $juguete->url }}">
                    </form>
                </div>
            @endforeach

            @empty($arrToys)
                <div class="col-12">
                    <div class="alert alert-warning text-center" role="alert">
                        ¡Vaya! No encontramos juguetes para tus criterios de búsqueda.
                    </div>
                </div>
            @endempty

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
