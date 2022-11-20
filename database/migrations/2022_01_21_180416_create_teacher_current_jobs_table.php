<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherCurrentJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_current_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('minstry');
            $table->string('departement');
            $table->string('job_title');
            $table->string('position');
            $table->string('reg_date');
            $table->text('jop_posistion');
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
        Schema::dropIfExists('teacher_current_jobs');
    }
}
