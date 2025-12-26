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
        Schema::create('student_scholarship', function (Blueprint $table) {
            $table->id();

            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->foreignId('scholarship_id')->constrained('scholarships')->onDelete('cascade');
            $table->string('course');
            $table->integer('year_gap')->nullable();
            $table->string('academic_marks');
            $table->string('green_book_number');
            $table->string('parent_name');
            $table->string('parent_contact');
            $table->string('phone_number');
            $table->enum('status', ['pending','approved','rejected'])->default('pending');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_scholarship');
    }
};
