<?php include(app_path().'/includes/header.php'); ?>
<?php include(app_path().'/includes/navbar.php'); ?>
<h1 class="text-center">Add Collection Event</h1>

<form action="/change/create" method="POST" class="text-center">
    {{ csrf_field() }}
    <div class="form-group w-25 m-auto">
        <label for="garbage">Choose the type:</label>
        <input type="text" class="form-control text-center" name="name" autocomplete="off" list="garbagelist" placeholder="Select or type the garbage typology" required>
        <datalist id="garbagelist">
            <option>Indifferenziato</option>
            <option>Vetro</option>
            <option>Plastica</option>
            <option>umido</option>
            <option>Carta</option>
        </datalist>
    </div>
    <div class="form-group w-25 m-auto">
        <label for="day">Choose a day:</label>
        <select class="form-control text-center" id="day" name="day" required>
            <option>Monday</option>
            <option>Tuesday</option>
            <option>Wednesday</option>
            <option>Thursday</option>
            <option >Friday</option>
            <option>Saturday</option>
            <option>Sunday</option>
        </select>
    </div>
    <div class="form-group w-25 m-auto">
        <label for="start">Choose the starting time:</label>
        <input class="form-control text-center" type="time" name="start" required>
    </div>
    <div class="form-group w-25 m-auto">
        <label for="end">Choose the end time:</label>
        <input class="form-control text-center" type="time" name="end" required>
    </div>
    <div>
        <button type="submit" class="btn btn-primary my-3">Add Collection Event</button>
    </div>

</form>
<?php include(app_path().'/includes/footer.php'); ?>
