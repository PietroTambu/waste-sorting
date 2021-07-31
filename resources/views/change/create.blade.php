<?php include(app_path().'/includes/header.php'); ?>
<?php include(app_path().'/includes/navbar.php'); ?>
    <h1>Add Collection Event</h1>

    <form action="/change/create" method="POST">
        {{ csrf_field() }}
        <p>
            <label for="garbage">Choose the type:</label>
            <input type="text" name="name" autocomplete="off" list="garbagelist" placeholder="Select or type the garbage typology" required>
            <datalist id="garbagelist">
                <option value="Indifferenziato">
                <option value="Vetro">
                <option value="Plastica">
                <option value="Umido">
                <option value="Carta">
            </datalist>
        </p>
        <p>
            <label for="day">Choose a day:</label>
            <select id="day" name="day" required>
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
                <option value="Saturday">Saturday</option>
                <option value="Sunday">Sunday</option>
            </select>
        </p>
        <p>
            <label for="start">Choose the starting time:</label>
            <input type="time" name="start" required>
        </p>
        <p>
            <label for="end">Choose the end time:</label>
            <input type="time" name="end" required>
        </p>
        <p>
        <button type="submit">Add Collection Event</button>
        </p>
        
    </form>
<?php include(app_path().'/includes/footer.php'); ?>