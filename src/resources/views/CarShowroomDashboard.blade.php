<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body class="d-flex flex-column h-100">
<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="/">Fixed navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
</header>
<main role="main" class="flex-shrink-0">
    <div class="container" style="padding: 60px 15px 0">
        <h1>Car Showroom Dashboard</h1>

        <p>The average price on cars sold for all the time: {{ $avg_sold_total }}</p>
        <p>The average price on cars sold today: {{ $avg_sold_today }}</p>

        <div>
            <p>The average price on cars sold for the last year divided by day:</p>

            <table class="table table-striped table-hover" id="users">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Day</th>
                        <th scope="col">No. of cars sold:</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($avg_sold_year as $day => $price)
                        <tr>
                            <th scope="row" id="user-{{ $day }}">{{ $day }}</th>
                            <th>{{ $price }}</th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div>
            <p>The list of unsold cars:</p>
            <table class="table table-striped table-hover" id="users">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Year of manufacture</th>
                        <th scope="col">Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($unsold_cars as $car)
                        <tr>
                            <th scope="row" id="user-{{ $car->id }}">{{ $car->relatedModel->year_of_production }}</th>
                            <th>{{ $car->price }}</th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div>
            <p>The list of car models currently on sale:</p>
            <table class="table table-striped table-hover" id="users">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Model</th>
                    <th scope="col">Price</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($cars_on_sale as $car)
                    <tr>
                        <th scope="row" id="user-{{ $car->id }}">{{ $car->relatedModel->model }}</th>
                        <th>{{ $car->price }}</th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>

<footer class="footer mt-auto py-3">
    <div class="container">
        <span class="text-muted">Place sticky footer content here.</span>
    </div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>
