<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Collection Event</title>
</head>
<body>
    <h1>Add Collection Event</h1>

    <form action="/change/create" method="POST">
        {{ csrf_field() }}
        <p>
            <label for="garbage">Choose the type:</label>
            <input type="text" name="name" list="garbagelist" placeholder="Select or type the garbage typology">
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
            <select id="day" name="day">
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
            <input type="time" name="start">
        </p>
        <p>
            <label for="end">Choose the end time:</label>
            <input type="time" name="end">
        </p>
        <p>
        <button type="submit">Add Collection Event</button>
        </p>
        
    </form>
</body>
</html>