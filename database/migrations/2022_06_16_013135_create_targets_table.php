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
        Schema::create('targets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('target');
            $table->unsignedInteger('output_id')->nullable();
            $table->unsignedInteger('suboutput_id')->nullable();
            $table->foreign('output_id')->references('id')->on('outputs')->onDelete('cascade');
            $table->foreign('suboutput_id')->references('id')->on('suboutputs')->onDelete('cascade');
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
        Schema::dropIfExists('targets');
    }
};
