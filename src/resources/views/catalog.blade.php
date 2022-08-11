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
        <h1>Catalog</h1>

        @if (isset($catalog_units) and !empty($catalog_units))
            <table class="table table-striped table-hover" id="users">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Type</th>
                    <th scope="col">Price</th>
                    <th scope="col">Categories</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($catalog_units as $unit)
                    <tr>
                        <th scope="row" id="user-{{ $unit->id }}">{{ $unit->id }}</th>
                        <th>{{ $unit->type }}</th>
                        <th>{{ $unit->price }}</th>
                        <th>
                            @foreach ($unit->attributes as $attributeName => $attributeValue)
                                @if (is_iterable($attributeValue))
                                    @foreach ($attributeValue as $value)
                                        {{ $value }}
                                    @endforeach,
                                @else
                                    {{ $attributeName }}: {{ $attributeValue }},
                                @endif
                            @endforeach
                        </th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>Catalog is empty</p>
        @endif
        @if (isset($services) and !empty($services))
            <h2>Related services for: {{ $services[0]->attributes['RelationTypes'] | join(', ') }}</h2>

            <table class="table table-striped table-hover" id="users">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Type</th>
                    <th scope="col">Price</th>
                    <th scope="col">Categories</th>
                </tr>
                </thead>
                <tbody>
                @foreach($services as $service)
                    <tr>
                        <th scope="row" id="user-{{ $service->id }}">{{ $service->id }}</th>
                        <th>{{ $service->type }}</th>
                        <th>{{ $service->price }}</th>
                        <th>
                            @foreach ($service->attributes as $attributeName => $attributeValue)
                                @if (is_iterable($attributeValue))
                                    {{ $attributeName }}
                                    @foreach ($attributeValue as $value)
                                        {{ $value }},
                                    @endforeach
                                @else
                                    {{ $attributeName }}: {{ $attributeValue }}
                                @endif
                            @endforeach
                        </th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif

        @if (isset($cart_hist))
            <h2>Operations</h2>
            @foreach ($cart_hist as $operation)
                <div class="container">
                    <p>Total Price: {{ $operation->calculatePrice }}</p>
                    @foreach ($operation->getItems as $item)
                        <p><b><i>{{ $item->type }}</i></b>: {{ $item->price }}</p>
                        @foreach ($item->attributes as $attributeName => $attributeValue)
                            @if (is_iterable($attributeValue))
                                <p>{{ $attributeName }}: @foreach($attributeValue as $value) {{ $value }} @endforeach</p>
                            @else
                                <p>{{ $attributeName }}: {{ $attributeValue }}</p>
                            @endif
                        @endforeach
                    @endforeach
                    <hr>
                </div>
            @endforeach
        @endif
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
