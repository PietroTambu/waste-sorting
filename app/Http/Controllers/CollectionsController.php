<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;

class CollectionsController extends Controller
{
    private static function check_time_validity(?string $startHour, ?string $endHour) {
        if (substr($startHour, 0, 2) == '00') {
            $startHour = "12" . substr($startHour, 2, 3);
        } else if (substr($startHour, 0, 2) == '12') {
            $startHour = "00" . substr($startHour, 2, 3);
        }
        if (substr($endHour, 0, 2) == '00') {
            $endHour = "12" . substr($endHour, 2, 3);
        } else if (substr($endHour, 0, 2) == '12') {
            $endHour = "00" . substr($endHour, 2, 3);
        }
        $check_time_validity = false;
        if ((int)substr($startHour, 0, 2) < (int)substr($endHour, 0, 2)) {
            $check_time_validity = true;
        } else if ((int)substr($startHour, 0, 2) == (int)substr($endHour, 0, 2)) {
            if ((int)substr($startHour, 3, 2) < (int)substr($endHour, 3, 2)) {
                $check_time_validity = true;
            }
        }
        if ($check_time_validity == false) {
            echo "<script type='text/javascript'>alert(' Entered impossible time parameters \\n Check that the start time occurs before the end time');</script>";
            return false;
        } else {
            return
                array(
                "startHour" => $startHour,
                "endHour" => $endHour
            );
        }
    }
    public static function showDaily () {
        $today = date("l");
        $data = Data::where('day', $today)->orderBy('start', 'ASC')->get();
        $title = 'Daily Page';
        return view('daily.index', compact('data', 'title'));
    }
    public static function showWeekly () {
        $data = [
            'monday' => Data::where('day', 'monday')->get(),
            'tuesday' => Data::where('day', 'tuesday')->get(),
            'wednesday' => Data::where('day', 'wednesday')->get(),
            'thursday' => Data::where('day', 'thursday')->get(),
            'friday' => Data::where('day', 'friday')->get(),
            'saturday' => Data::where('day', 'saturday')->get(),
            'sunday' => Data::where('day', 'sunday')->get()
        ];
        $title = 'Weekly Page';
        return view('weekly.index', compact('data', 'title'));
    }
    public static function insertData () {
        $collection = new Data;

        $time = self::check_time_validity(request('start'), request('end'));

        if ($time) {
            $collection->name = request('name');
            $collection->day = request('day');
            $collection->start = $time['startHour'];
            $collection->end = $time['endHour'];
            $collection->save();
            return redirect('/weekly');
        } else {
            return "<button><a href='/change/create'>RETRY...</a></button>";
        }
    }
    public static function updateData () {
        if (request('name') != '') { $name = request('name'); } else { $name = request('nameOld'); }
        if (request('start') != '') { $startHour = request('start'); } else { $startHour = request('startOld'); }
        if (request('start') != '') { $endHour = request('end'); } else { $endHour = request('endOld'); }

        $time = self::check_time_validity($startHour, $endHour);

        if ($time) {
            Data::where('id', request('id'))
                ->update(
                    ['name' => $name,
                    'day' => request('day'),
                    'start' => $time['startHour'],
                    'end' => $time['endHour'],
                    'updated_at' => date('y-m-d H:i:s')]
                );
            return redirect('/weekly');
        } else {
            return "<button><a href='/weekly'>RETRY...</a></button>";
        }

    }
    public static function deleteData () {
        $id = $_GET['id'];
        $collection = Data::find($id);
        $collection->delete();
        return redirect('/weekly');
    }
    public static function exampleData () {
        Data::insert(['name' => 'Indifferenziato', 'day' => 'Monday', 'start' => '09:00:00', 'end' => '13:00:00', 'updated_at' => date('y-m-d H:i:s'), 'created_at' => date('y-m-d H:i:s')]);
        Data::insert(['name' => 'Vetro', 'day' => 'Wednesday', 'start' => '15:00:00', 'end' => '17:00:00', 'updated_at' => date('y-m-d H:i:s'), 'created_at' => date('y-m-d H:i:s')]);
        Data::insert(['name' => 'Carta', 'day' => 'Thursday', 'start' => '19:00:00', 'end' => '21:00:00', 'updated_at' => date('y-m-d H:i:s'), 'created_at' => date('y-m-d H:i:s')]);
        Data::insert(['name' => 'Umido', 'day' => 'Friday', 'start' => '11:00:00', 'end' => '14:00:00', 'updated_at' => date('y-m-d H:i:s'), 'created_at' => date('y-m-d H:i:s')]);
        Data::insert(['name' => 'Plastica', 'day' => 'Saturday', 'start' => '17:00:00', 'end' => '20:00:00', 'updated_at' => date('y-m-d H:i:s'), 'created_at' => date('y-m-d H:i:s')]);
        Data::insert(['name' => 'Rifiuto Custom', 'day' => 'Sunday', 'start' => '23:00:00', 'end' => '23:59:59', 'updated_at' => date('y-m-d H:i:s'), 'created_at' => date('y-m-d H:i:s')]);
        return redirect('/weekly');
    }
}
