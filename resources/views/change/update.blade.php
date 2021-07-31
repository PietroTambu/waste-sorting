<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Collection</title>
</head>
<body>
    <h1>Update Garbage Collection</h1>

    <form action="/change/update" method="POST">
        {{ csrf_field() }}
        <p>
            <label for="id">Inser the ID of the Collection *</label>
            <input type="text" name="id" placeholder="ID of the Collection" required>
        </p>
        <p>
            <label for="garbage">Change the type?:</label>
            <input type="text" name="name" list="garbagelist" placeholder="Select or type the garbage typology">
            <datalist id="garbagelist">
                <option value="No">
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
                <option value="monday">Monday</option>
                <option value="tuesday">Tuesday</option>
                <option value="wednesday">Wednesday</option>
                <option value="thursday">Thursday</option>
                <option value="friday">Friday</option>
                <option value="saturday">Saturday</option>
                <option value="sunday">Sunday</option>
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