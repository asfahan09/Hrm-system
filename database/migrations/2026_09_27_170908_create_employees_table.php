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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->string('employee_code')->unique();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->enum('gender', ['male', 'female', 'others'])->default('male');
            $table->date('date_of_birth')->nullable();
            $table->foreignId('department_id')->nullable()->constrained('departments')->cascadeOnDelete();
            $table->foreignId('designation_id')->nullable()->constrained('designations')->cascadeOnDelete();
            $table->enum('employement_type', ['full_time', 'part_time', 'contract', 'intern'])->default('full_time');
            $table->boolean('is_active')->default(true);
            $table->decimal('salary', 12, 2)->default(0);
            $table->string('avatar')->nullable();
            $table->text('address')->nullable();
            $table->string('emergency_no')->nullable();




            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
