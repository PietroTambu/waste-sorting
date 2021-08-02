<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    protected $table = 'events';
    protected $connection = 'mysql';

    public function store(Request $request)
    {
        $collection = new Data;

        $collection->name = $request->name;
        $collection->day = $request->day;
        $collection->start = $request->start;
        $collection->end = $request->end;

        $collection->save();
    }
    public function updateCollection ($param) {
        $collection = Data::find($param->id);

        $collection->name = 'Friday';

        $collection->save();
    }
    public function deleteCollection ($param) {
        $Collection = Data::find($param);

        $Collection->delete();
    }
}
