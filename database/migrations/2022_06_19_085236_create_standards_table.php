<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('standards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('eff_five')->nullable();
            $table->string('eff_four')->nullable();
            $table->string('eff_three')->nullable();
            $table->string('eff_two')->nullable();
            $table->string('eff_one')->nullable();
            $table->string('qua_five')->nullable();
            $table->string('qua_four')->nullable();
            $table->string('qua_three')->nullable();
            $table->string('qua_two')->nullable();
            $table->string('qua_one')->nullable();
            $table->string('time_five')->nullable();
            $table->string('time_four')->nullable();
            $table->string('time_three')->nullable();
            $table->string('time_two')->nullable();
            $table->string('time_one')->nullable();
            $table->unsignedInteger('target_id');
            $table->foreign('target_id')->references('id')->on('targets')->onDelete('cascade');
            $table->foreignId('user_id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('standards');
    }
};
