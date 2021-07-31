<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Collections</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <h1 class="text-center">Daily collections</h1>
    <h2>Today is: <?= date("l") ?></h2>
    <?php
        date_default_timezone_set("Europe/Rome");
        echo "The time is " . date("H:i:s");
    ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Tipology</th>
                <th scope="col">Day</th>
                <th scope="col">Start At:</th>
                <th scope="col">End At:</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $collection)
                <tr>
                    <td>{{ $collection->name }}</td>
                    <td><strong>{{ $collection->day }}</strong></td> 
                    <td>{{ $collection->start }}</td>
                    <td>{{ $collection->end }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>