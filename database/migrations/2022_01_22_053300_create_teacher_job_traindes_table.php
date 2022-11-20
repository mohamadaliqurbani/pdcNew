<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherJobTraindesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_job_traindes', function (Blueprint $table) {
            $table->id();
            $table->string('country');
            $table->string('edu_center');
            $table->string('edu_field');
            $table->string('duration');
            $table->string('start_date');
            $table->string('end_date');
            $table->foreignId('teacher_info_id')->constrained(
                'teacher_infos'
            )->cascadeOnDelete()
                ->cascadeOnUpdate();	
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
        Schema::dropIfExists('teacher_job_traindes');
    }
}
