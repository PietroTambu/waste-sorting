<?php $active_weekly='active'; ?>
<?php include(app_path().'/include/header.php'); ?>
<?php include(app_path().'/include/navbar.php'); ?>

    <?php $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday']; ?>
    <h1 class="text-center center">Weekly collections</h1>

    <table class="table table-striped">
        <thead>
            <tr class="text-center">
                <th scope="col">Typology</th>
                <th scope="col">Day</th>
                <th scope="col">Start At:</th>
                <th scope="col">End At:</th>
                <th scope="col">Delete</th>
                <th scope="col">Update</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($days as $day)
                @foreach ($data['fetchedData'][$day] as $event_schedule)
                    <tr class="text-center">
                        <td>{{ $event_schedule->typology }}</td>
                        <td><strong>{{ $event_schedule->day }}</strong></td>
                        <td>{{ $event_schedule->start_at}}</td>
                        <td>{{ $event_schedule->end_at }}</td>
                        <td>
                            <form method="get" action="/change/delete/{{ $event_schedule->id }}">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                        <td>
                            <form method="get" action="/change/update/{{ $event_schedule->id }}">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>

<?php include(app_path().'/include/footer.php'); ?>
