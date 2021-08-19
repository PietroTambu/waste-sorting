<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGarbageScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('garbage_schedule', function (Blueprint $table) {
            $table->id();
            $table->string('typology');
            $table->foreign('typology')->references('ID_typology')->on('garbage');
            $table->string('day');
            $table->time('start_at');
            $table->time('end_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('garbage_schedule');
    }
}
