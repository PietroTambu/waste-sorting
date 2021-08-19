<?php $active_new='active'; ?>
<?php include(app_path().'/Include/header.php'); ?>
<?php include(app_path().'/Include/navbar.php'); ?>
<h1 class="text-center">Add Collection</h1>

<form action="/change/create" method="POST" class="text-center w-25 m-auto">
    {{ csrf_field() }}
    <div class="form-outline mb-4">
        <input type="text" class="form-control" name="typology" autocomplete="off" list="garbagelist" placeholder="Select or type the garbage typology" required>
        <datalist id="garbagelist">
            <option>Indifferenziato</option>
            <option>Vetro</option>
            <option>Plastica</option>
            <option>Umido</option>
            <option>Carta</option>
        </datalist>
    </div>
    <div class="form-outline mb-4">
        <label for="day">Choose a day:</label>
        <select class="form-control" id="day" name="day" required>
            <option>Monday</option>
            <option>Tuesday</option>
            <option>Wednesday</option>
            <option>Thursday</option>
            <option>Friday</option>
            <option>Saturday</option>
            <option>Sunday</option>
        </select>
    </div>
    <div class="form-group">
        <label for="start">Choose the starting time:</label>
        <input id="start" class="form-control text-center" type="time" name="start_at" required>
    </div>
    <div class="form-group">
        <label for="end">Choose the end time:</label>
        <input id="end" class="form-control text-center" type="time" name="end_at" required>
    </div>
    <div>
        <button type="submit" class="btn btn-primary my-3">Add Collection Event</button>
    </div>

</form>
<?php include(app_path().'/Include/footer.php'); ?>
