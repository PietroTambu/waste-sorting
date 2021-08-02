<?php $active_daily='active' ?>
<?php include(app_path().'/includes/header.php'); ?>
<?php include(app_path().'/includes/navbar.php'); ?>

    <h1 class="text-center">Daily collections</h1>
    <div class="container">
        <div class="row text-center">
            <h2 class="col">Today is: <?= date("l") ?></h2>
            <h3 class="col">Time: <?php date_default_timezone_set("Europe/Rome"); echo date("H:i:s"); ?></h3>
        </div>
    </div>




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
                <?php
                    $table = '';
                    if (strtotime($collection->end) < strtotime(date("H:i:s"))) { $table = 'table-danger'; }
                    else if ((strtotime($collection->start) < strtotime(date("H:i:s"))) && (strtotime($collection->end) > strtotime(date("H:i:s")))) { $table = 'table-success'; }
                ?>
                <tr class="<?= $table ?>">
                    <td>{{ $collection->name }}</td>
                    <td><strong>{{ $collection->day }}</strong></td>
                    <td>{{ $collection->start }}</td>
                    <td>{{ $collection->end }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
<?php include(app_path().'/includes/footer.php'); ?>
