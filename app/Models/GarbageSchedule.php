<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GarbageSchedule extends Model
{
    protected $table = 'garbage_schedule';
    protected $connection = 'mysql';
    public $timestamps = false;

    public function storeSchedule($param): bool
    {
        $time = check_time_validity($param->start_at, $param->end_at);
        if ($time) {
            $record = new GarbageSchedule();
            $record->typology = $param->typology;
            $record->day = $param->day;
            $record->start_at = $time['startHour'];
            $record->end_at = $time['endHour'];
            $record->save();
            return true;
        } else {
            return false;
        }
    }
    public function updateSchedule($param)
    {
        $time = check_time_validity($param->start_at, $param->end_at);
        if ($time) {
            $garbageSchedule = GarbageSchedule::find($param->id);
            $garbageSchedule->typology = $param->typology;
            $garbageSchedule->day = $param->day;
            $garbageSchedule->start_at = $param->start_at;
            $garbageSchedule->end_at = $param->end_at;
            $garbageSchedule->save();
        }
    }
    public static function showDaily(): array
    {
        $today = date("l");
        $fetchedData = GarbageSchedule::where('day', $today)->orderBy('start_at', 'ASC')->get();
        $title = 'Daily Page';
        return array(
            'fetchedData' => $fetchedData,
            'title' => $title
        );
    }
    public static function showWeekly(): array
    {
        $fetchedData = [
            'monday' => GarbageSchedule::where('day', 'monday')->get(),
            'tuesday' => GarbageSchedule::where('day', 'tuesday')->get(),
            'wednesday' => GarbageSchedule::where('day', 'wednesday')->get(),
            'thursday' => GarbageSchedule::where('day', 'thursday')->get(),
            'friday' => GarbageSchedule::where('day', 'friday')->get(),
            'saturday' => GarbageSchedule::where('day', 'saturday')->get(),
            'sunday' => GarbageSchedule::where('day', 'sunday')->get()
        ];
        $title = 'Weekly Page';
        return array(
            'fetchedData' => $fetchedData,
            'title' => $title
        );
    }
    public static function showCreateSchedule(): array
    {
        $title = 'Create Garbage Schedule';
        return array('title' => $title);
    }
    public static function showUpdateSchedule($id): array
    {
        $title = 'Update Garbage Schedule';
        $fetchedData = GarbageSchedule::where('id', $id)->get();
        return array(
            'fetchedData' => $fetchedData,
            'title' => $title
        );
    }
    public static function deleteSchedule($id)
    {
        $garbageSchedule = GarbageSchedule::find($id);
        $garbageSchedule->delete();
    }
}

