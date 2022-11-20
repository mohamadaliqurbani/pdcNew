<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherRewardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_rewards', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('from_dep');
            $table->string('reward_type');
            $table->date('issue_date');	
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
        Schema::dropIfExists('teacher_rewards');
    }
}
