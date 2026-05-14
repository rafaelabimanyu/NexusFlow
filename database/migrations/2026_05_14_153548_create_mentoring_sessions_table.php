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
        Schema::create('mentoring_sessions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('mentor_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('member_id')->constrained('users')->onDelete('cascade');
            $table->dateTime('scheduled_at');
            $table->integer('duration')->default(60);
            $table->string('status')->default('scheduled');
            $table->string('meeting_link')->nullable();
            $table->text('summary')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mentoring_sessions');
    }
};
