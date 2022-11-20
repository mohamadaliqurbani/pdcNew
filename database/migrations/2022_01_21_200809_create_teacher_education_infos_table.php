<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherEducationInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_education_infos', function (Blueprint $table) {
            $table->id();
            $table->string('ed_place');
            $table->string('ed_center_name');
            $table->string('eduDegree');
            $table->string('collage');
            $table->string('ed_faild');
            $table->date('started_date');
            $table->date('end_date');
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
        Schema::dropIfExists('teacher_education_infos');
    }
}
