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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->enum('gender', ['Male', 'Female']);
            $table->date('dob');
            $table->string('photo_url', 255)->nullable();
            $table->text('address')->nullable();
            $table->string('grade', 10);
            $table->enum('session', ['Morning', 'Afternoon']);
            $table->string('parent_contact', 100);
            $table->date('enrolled_date');
            $table->enum('status', ['active', 'inactive', 'graduated', 'transferred']);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            // Add foreign key constraints for UUID columns
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');

        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
