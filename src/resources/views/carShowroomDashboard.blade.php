<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>

    @vite('resources/css/app.css')
</head>
<body class="bg-black font-sans leading-normal tracking-normal">
    <div class="container w-full mx-auto pt-20">
        <div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-800 leading-normal">
            <div class="flex flex-wrap">
                <div class="w-full md:w-1/2 xl:w-1/2 p-3">
                    <div class="bg-gray-900 border border-gray-800 rounded shadow p-2">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded p-3 bg-green-600"><i class="fa fa-wallet fa-2x fa-fw fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-400">Total average price</h5>
                                <h3 class="font-bold text-3xl text-gray-600">{{ $avg_sold_total }} <span class="text-green-500"><i class="fas fa-caret-up"></i></span></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 xl:w-1/2 p-3">
                    <div class="bg-gray-900 border border-gray-800 rounded shadow p-2">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded p-3 bg-pink-600"><i class="fas fa-users fa-2x fa-fw fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-400">Today average price</h5>
                                <h3 class="font-bold text-3xl text-gray-600">{{ $avg_sold_today ?? 0 }} <span class="text-pink-500"><i class="fas fa-exchange-alt"></i></span></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-400 leading-normal md:text-center content-center">
            <div class="bg-gray-900 border border-gray-800 rounded shadow p-2">
                <p>The average price on cars sold for the last year divided by day:</p>

                <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col">Day</th>
                            <th scope="col">No. of cars sold:</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($avg_sold_year as $index => $day)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" id="{{ $day['day'] }}">{{ $day['day'] }}</th>
                                <th>{{ $day['total'] }}</th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-400 leading-normal md:text-center content-center">
            <div class="bg-gray-900 border border-gray-800 rounded shadow p-2">
                <p>The list of unsold cars:</p>
                <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400" id="users">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col">Year of manufacture</th>
                            <th scope="col">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($unsold_cars as $car)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" id="user-{{ $car->id }}">{{ $car->relatedModel->year_of_production }}</th>
                                <th>{{ $car->price }}</th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-400 leading-normal md:text-center content-center">
            <div class="bg-gray-900 border border-gray-800 rounded shadow p-2">
                <p>The list of car models currently on sale:</p>
                <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400" id="users">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col">Model</th>
                        <th scope="col">Year of production</th>
                        <th scope="col">Color</th>
                        <th scope="col">Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($cars_on_sale as $car)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" id="user-{{ $car->id }}">{{ $car->relatedModel->model }}</th>
                            <th>{{ $car->relatedModel->year_of_production }}</th>
                            <th>{{ $car->color }}</th>
                            <th>{{ $car->price }}</th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
