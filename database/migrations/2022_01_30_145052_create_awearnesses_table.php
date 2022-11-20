<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAwearnessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('awearnesses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('work_shop_id')->constrained('work_shops')
            ->cascadeOnDelete()->cascadeOnUpdate();
            $table->morphs('awearnesseable');
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
        Schema::dropIfExists('awearnesses');
    }
}
