<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;

class CollectionsController extends Controller
{
    public function showDaily () {
        $today = date("l");
        $data = Data::where('day', $today)->get();

        return view('daily.index', compact('data'));
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
        return view('weekly.index', compact('data'));
    }
    public static function insertData () {
        $collection = new Data;

        $collection->name = request('name');
        $collection->day = request('day');
        $collection->start = request('start');
        $collection->end = request('end');
        $collection->save();

        return redirect('/weekly');
    }
}
