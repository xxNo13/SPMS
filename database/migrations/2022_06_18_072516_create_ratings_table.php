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
        Schema::create('ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('accomplishment');
            $table->integer('efficiency')->nullable();
            $table->integer('quality')->nullable();
            $table->integer('timeliness')->nullable();
            $table->double('average', 3, 2);
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
        Schema::dropIfExists('ratings');
    }
};
