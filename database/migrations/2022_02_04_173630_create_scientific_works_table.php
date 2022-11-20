<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScientificWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scientific_works', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('type');
            $table->string('level');
            $table->text('dicribesion');
            $table->date('relase_date');
            $table->text('duration')->nullable();
            $table->string('cover_photo')->nullable();
            $table->string('work_url')->nullable();
            $table->string('file_work');
            $table->morphs('scientificable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scientific_works');
    }
}
