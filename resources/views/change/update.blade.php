<?php include(app_path().'/include/header.php'); ?>
<?php include(app_path().'/include/navbar.php'); ?>

    <h1 class="text-center">Update Collection</h1>
    <?php $collection = json_decode($_GET['collection']); ?>

    <form action="/change/updateData" method="POST">
        {{ csrf_field() }}
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
                    <td>{{ $collection->name }}</td>
                    <td><strong>{{ $collection->day }}</strong></td>
                    <td>{{ $collection->start }}</td>
                    <td>{{ $collection->end }}</td>
                    <td><strong>ID: {{ $collection->id }}</strong></td>
                </tr>
                <tr>
                    <td>
                        <div class="form-outline mb-4">
                            <label for="garbagelist">Choose a typology:</label>
                            <input type="text" class="form-control" name="name" autocomplete="off" list="garbagelist" placeholder="Select or type the garbage typology">
                            <datalist id="garbagelist">
                                <option>Indifferenziato</option>
                                <option>Vetro</option>
                                <option>Plastica</option>
                                <option>umido</option>
                                <option>Carta</option>
                            </datalist>
                        </div>
                    </td>
                    <td>
                        <div class="form-outline mb-4">
                            <label for="day">Choose a day:</label>
                            <select class="form-control" id="day" name="day">
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
                            <label for="start">Choose the starting time:</label>
                            <input class="form-control text-center" type="time" name="start">
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <label for="end">Choose the end time:</label>
                            <input class="form-control text-center" type="time" name="end">
                        </div>
                    </td>
                    <td>
                        <div>
                            <input type="text" name="id" value="{{ $collection->id }}" class="d-none">
                            <input type="text" name="nameOld" value="{{ $collection->name }}" class="d-none">
                            <input type="text" name="startOld" value="{{ $collection->start }}" class="d-none">
                            <input type="text" name="endOld" value="{{ $collection->end }}" class="d-none">
                            <button type="submit" class="btn btn-primary my-3">Update</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
<?php include(app_path().'/include/footer.php'); ?>
