<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GarbageDBSeeder extends Seeder
{
    public function run()
    {
        DB::table('garbage')->insertOrIgnore([
            ['ID_typology' => 'Indifferenziato'],
            ['ID_typology' => 'Carta'],
            ['ID_typology' => 'Vetro'],
            ['ID_typology' => 'Umido'],
            ['ID_typology' => 'Plastica'],
        ]);

        DB::table('garbage_schedule')->insert([
            ['typology' => 'Indifferenziato', 'day' => 'Monday', 'start_at' => '09:00:00', 'end_at' => '11:00:00'],
            ['typology' => 'Carta', 'day' => 'Tuesday', 'start_at' => '11:00:00', 'end_at' => '13:00:00'],
            ['typology' => 'Umido', 'day' => 'Wednesday', 'start_at' => '16:00:00', 'end_at' => '17:00:00'],
            ['typology' => 'Plastica', 'day' => 'Thursday', 'start_at' => '12:00:00', 'end_at' => '14:00:00'],
            ['typology' => 'Vetro', 'day' => 'Friday', 'start_at' => '18:00:00', 'end_at' => '21:00:00'],
            ['typology' => 'Carta', 'day' => 'Saturday', 'start_at' => '20:30:00', 'end_at' => '22:30:00'],
            ['typology' => 'Plastica', 'day' => 'Sunday', 'start_at' => '23:00:00', 'end_at' => '24:00:00']
        ]);
    }
}
