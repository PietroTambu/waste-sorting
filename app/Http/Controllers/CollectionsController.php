<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;

class CollectionsController extends Controller
{
    public function showDaily () {
        $today = date("l");
        $data = Data::where('day', $today)->orderBy('start', 'ASC')->get();
        $title = 'Daily Page';
        return view('daily.index', compact('data', 'title'));
    }
    public function showWeekly () {
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
        // die(var_dump(request('start')));
        $startHour = request('start');
        $endHour = request('end');
        
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
            echo "<script type='text/javascript'>alert('Time invalid');</script>";
            echo "<button><a href='/change/create'>RETRY...</a></button>";
            return;
        } else {
            $collection->name = request('name');
            $collection->day = request('day');
            $collection->start = $startHour;
            $collection->end = $endHour;
            $collection->save();
            return redirect('/weekly');
        }
    }
    public static function deleteData () {
        $title = 'Delete Page';
        $id = $_GET['id'];
        $collection = Data::find($id);
        $collection->delete(); 
        return redirect('/weekly');
    }
}
