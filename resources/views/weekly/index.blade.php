<?php include(app_path().'/includes/header.php'); ?>
<?php include(app_path().'/includes/navbar.php'); ?>

    <?php $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday']; ?>
    <h1 class="text-center center">Weekly collections</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Tipology</th>
                <th scope="col">Day</th>
                <th scope="col">Start At:</th>
                <th scope="col">End At:</th>
                <th scope="col">Delete</th>
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
                        <td>
                            <form method="get" action="/change/delete">
                                <input type="text" name="id" value="{{ $collection->id }}" class="d-none">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>

<?php include(app_path().'/includes/footer.php'); ?>