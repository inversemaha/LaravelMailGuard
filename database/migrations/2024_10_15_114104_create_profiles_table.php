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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to `users` table
            $table->string('nature_of_ownership');
            $table->string('tin')->unique();
            $table->string('bin')->nullable();
            $table->integer('year_of_registration');
            $table->integer('years_in_operation');
            $table->string('registered_office_address');
            $table->string('website_url')->nullable();
            $table->string('contact_person_name');
            $table->string('contact_person_email');
            $table->string('contact_person_phone');
            $table->string('trade_license'); // File path or name
            $table->string('tin_certificate'); // File path or name
            $table->string('bin_certificate')->nullable(); // File path or name
            $table->string('certificate_of_incorporation')->nullable(); // File path or name
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
