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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password')->default('password123');
            $table->char('sex');
            $table->date('birthday');
            $table->foreignId('program_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password')->default('password123');
            $table->char('sex');
            $table->date('birthday');
            $table->integer('year_level');
            $table->foreignId('program_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        //creating subject table
        Schema::create('subjects', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('code')->unique(); // Subject Code
            $table->string('name');
            $table->text('description')->nullable();
            $table->float('credits');
            $table->timestamps();
        });

        Schema::create('offers', function (Blueprint $table){
            $table->id();
            $table->char('section')->nullable();
            $table->string('schedule')->nullable();
            $table->string('room')->nullable();
            $table->integer('capacity')->default('40');
            $table->integer('year_level');
            $table->foreignId('program_id')->constrained()->onDelete('cascade');
            $table->foreignId('subject_id')->constrained()->onDelete('cascade');
            $table->foreignId('teacher_id')->nullable()->constrained()->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('enrollments', function (Blueprint $table){
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->foreignId('offer_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
        Schema::dropIfExists('offers');
        Schema::dropIfExists('subjects');
        Schema::dropIfExists('teachers');
        Schema::dropIfExists('students');
        Schema::dropIfExists('programs');

    }
};
