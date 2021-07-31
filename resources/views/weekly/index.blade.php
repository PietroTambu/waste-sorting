<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weekly collections</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <?php $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday']; ?>
    <h1 class="text-center center">Weekly collections</h1>

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
            @foreach ($days as $day)
                @foreach ($data[$day] as $collection)
                    <tr>
                        <td>{{ $collection->name }}</td>
                        <td><strong>{{ $collection->day }}</strong></td> 
                        <td>{{ $collection->start }}</td>
                        <td>{{ $collection->end }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</body>
</html>