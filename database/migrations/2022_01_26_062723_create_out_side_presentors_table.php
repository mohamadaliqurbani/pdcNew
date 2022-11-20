<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutSidePresentorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('out_side_presentors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('work_shop_id')->constrained('work_shops')
            ->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name',100);
            $table->string('lname',100);
            $table->string('education');
            $table->string('email',150);
            $table->string('phone',150);
            $table->enum('gender',['مرد','زن']);
            $table->string('image');
            $table->text('info')->nullable();

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
        Schema::dropIfExists('out_side_presentors');
    }
}
