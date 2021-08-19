<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\GarbageSchedule;
use Database\Seeders\GarbageDBSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GarbageController extends Controller
{
    public function storeSchedule(Request $request){
        DB::table('garbage')->insertOrIgnore([
            'ID_typology' => $request->typology
        ]);
        $record = new GarbageSchedule;
        $res = $record->storeSchedule($request);
        if (!$res) {
            return self::showCreateSchedule();
        }
        return self::showWeekly();
    }
    public function updateSchedule(Request $request){
        DB::table('garbage')->insertOrIgnore([
            'ID_typology' => $request->typology
        ]);
        $record = new GarbageSchedule;
        $record->updateSchedule($request);
        return self::showWeekly();
    }
    public function showWeekly(){
        $data = GarbageSchedule::showWeekly();
        return view('weekly.index', compact('data'));
    }
    public function showDaily(){
        $data = GarbageSchedule::showDaily();
        return view('daily.index', compact('data'));
    }
    public function showCreateSchedule(){
        $data = GarbageSchedule::showCreateSchedule();
        return view('change.create', compact('data'));
    }
    public function showUpdateSchedule(GarbageSchedule $id){
        $data = GarbageSchedule::showUpdateSchedule($id->id);
        return view('change.update', compact('data'));
    }
    public function seedDB() {
        $seed = new GarbageDBSeeder;
        $seed->run();
        return self::showWeekly();
    }
    public function deleteSchedule(GarbageSchedule $id){
        GarbageSchedule::deleteSchedule($id->id);
        return self::showWeekly();
    }
}
