<?php $active_daily='active' ?>
<?php include(app_path().'/Include/header.php'); ?>
<?php include(app_path().'/Include/navbar.php'); ?>

    <h1 class="text-center">Daily collections</h1>
    <div class="container">
        <div class="row text-center">
            <h2 class="col">Today is: <?= date("l") ?></h2>
            <h3 class="col">Time: <?php date_default_timezone_set("Europe/Rome"); echo date("H:i:s"); ?></h3>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr class="text-center">
                <th scope="col">Tipology</th>
                <th scope="col">Day</th>
                <th scope="col">Start At:</th>
                <th scope="col">End At:</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data['fetchedData'] as $event_schedule)
                <?php
                    $table = '';
                    if (strtotime($event_schedule->end_at ?? '') < strtotime(date("H:i:s"))) { $table = 'table-danger'; }
                    else if ((strtotime($event_schedule->start_at) < strtotime(date("H:i:s"))) && (strtotime($event_schedule->end_at) > strtotime(date("H:i:s")))) { $table = 'table-success'; }
                ?>
                <tr class="<?= $table ?> text-center">
                    <td>{{ $event_schedule->typology }}</td>
                    <td><strong>{{ $event_schedule->day }}</strong></td>
                    <td>{{ $event_schedule->start_at }}</td>
                    <td>{{ $event_schedule->end_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
<?php include(app_path().'/include/footer.php'); ?>
