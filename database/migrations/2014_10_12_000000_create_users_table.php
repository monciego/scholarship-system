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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('id_number');
            $table->string('number_of_studying_siblings')->nullable();
            $table->string('house_hold_per_capita_income'); // family income annual
            $table->string('birthday');
            $table->string('have_existing_scholarship')->nullable();
            $table->string('othersInput')->nullable();
            $table->string('age')->nullable(); // auto generated

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
