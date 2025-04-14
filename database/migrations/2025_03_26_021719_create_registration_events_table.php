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
        Schema::create('registration_events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained('events');
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('certificate_name');
            $table->string('country');
            $table->string('city');
            $table->string('postal_code');
            $table->string('telephone')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('website')->nullable();
            $table->string('instagram_facebook')->nullable();
            $table->string('performance_type')->nullable();
            $table->string('performance_title')->nullable();
            $table->string('performance_minute')->nullable();
            $table->string('music_type')->nullable();
            $table->integer('performance_number');
            $table->integer('pax_total')->default(1);
            $table->string('ticket_file')->nullable();
            $table->string('proof_of_payment')->nullable();
            $table->foreignId('payment_method_id')->nullable()->constrained('payment_methods');
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registration_events');
    }
};
