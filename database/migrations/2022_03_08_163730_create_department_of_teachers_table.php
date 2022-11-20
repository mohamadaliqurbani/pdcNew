<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentOfTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department_of_teachers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->constrained('departments')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();
            $table->foreignId('teacher_info_id')->constrained('teacher_infos')
            ->cascadeOnDelete()
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
        Schema::dropIfExists('department_of_teachers');
    }
}
