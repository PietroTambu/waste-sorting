<?php $active_main='active'; ?>
<?php include(app_path().'/Include/header.php'); ?>
<?php include(app_path().'/Include/navbar.php'); ?>

    <h1 class="text-center">Welcome to Waste Sorting Planning</h1>
    <hr>
    <div class="text-center">
        <h2>You can seed the DB by clicking <a href="/seedDB" class="text-center">here</a></h2>
        <h3>Otherwise you can insert manually by the <i><a href="/change/create">new garbage schedule</a></i> route</h3>
    </div>

<?php include(app_path().'/Include/footer.php'); ?>
