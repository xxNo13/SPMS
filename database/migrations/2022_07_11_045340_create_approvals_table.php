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
        Schema::create('approvals', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('user_id')->on('users')->onDelete('cascade');
            $table->foreignId('headoffice_id')->on('users')->onDelete('cascade');
            $table->string('headoffice_status')->nullable();
            $table->foreignId('hdu_id')->on('users')->onDelete('cascade');
            $table->string('hdu_status')->nullable();
            $table->string('type');
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
        Schema::dropIfExists('approvals');
    }
};
