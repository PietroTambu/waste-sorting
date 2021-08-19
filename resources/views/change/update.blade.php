<?php include(app_path().'/Include/header.php'); ?>
<?php include(app_path().'/Include/navbar.php'); ?>

<h1 class="text-center">Update Collection</h1>

<form action="/change/update" method="POST">
    {{ csrf_field() }}
    @foreach ($data['fetchedData'] as $event_schedule)
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Tipology</th>
            <th scope="col">Day</th>
            <th scope="col">Start At:</th>
            <th scope="col">End At:</th>
            <th scope="col">Update</th>
        </tr>
        </thead>
        <tbody>

        <tr>
            <td>{{ $event_schedule->typology }}</td>
            <td><strong>{{ $event_schedule->day }}</strong></td>
            <td>{{ $event_schedule->start_at }}</td>
            <td>{{ $event_schedule->end_at }}</td>
            <td><strong>ID: {{ $event_schedule->id }}</strong></td>
        </tr>
        <tr>
            <td>
                <div class="form-outline mb-4">
                    <label for="garbagelist">Choose a typology:</label>
                    <input type="text" class="form-control" name="typology" autocomplete="off" list="garbagelist" placeholder="Select or type the garbage typology" required>
                    <datalist id="garbagelist">
                        <option>Indifferenziato</option>
                        <option>Vetro</option>
                        <option>Plastica</option>
                        <option>Umido</option>
                        <option>Carta</option>
                    </datalist>
                </div>
            </td>
            <td>
                <div class="form-outline mb-4">
                    <label for="day">Choose a day:</label>
                    <select class="form-control" id="day" name="day" required>
                        <option>Monday</option>
                        <option>Tuesday</option>
                        <option>Wednesday</option>
                        <option>Thursday</option>
                        <option >Friday</option>
                        <option>Saturday</option>
                        <option>Sunday</option>
                    </select>
                </div>
            </td>
            <td>
                <div class="form-group">
                    <label for="start_at">Choose the starting time:</label>
                    <input class="form-control text-center" type="time" name="start_at" required>
                </div>
            </td>
            <td>
                <div class="form-group">
                    <label for="end_at">Choose the end time:</label>
                    <input class="form-control text-center" type="time" name="end_at" required>
                </div>
            </td>
            <td>
                <input class="d-none" name="id" value="{{ $event_schedule->id }}">
                <button type="submit" class="btn btn-primary my-3">Update</button>
            </td>
        </tr>
        </tbody>
    </table>
    @endforeach
</form>
<?php include(app_path().'/Include/footer.php'); ?>
