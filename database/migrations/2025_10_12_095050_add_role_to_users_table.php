<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hotel_users', function (Blueprint $table) {
            $table->id('idUser');
            $table->string('fullName', 100);
            $table->string('phone', 15)->unique();
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->string('cccd_front')->nullable();
            $table->string('cccd_back')->nullable();
            $table->string('role')->default('user'); // user | admin
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_users');
    }
};
