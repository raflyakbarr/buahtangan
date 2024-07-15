<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('riwayat_points', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_number');
            $table->unsignedBigInteger('user_id');
            $table->integer('points');
            $table->timestamps();

            $table->foreign('member_number')->references('member_number')->on('members')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_points');
    }
};
