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
        Schema::create('researches', function (Blueprint $table) {
            $table->id();
            $table->string('project_name');
            $table->text('members');
            $table->string('department');
            $table->text('abstract');
            $table->string('file_path');
            $table->string('banner_image')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->string('type')->default('faculty'); // faculty, student, etc.
            $table->string('status')->default('Pending');
            $table->text('rejection_reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('researches');
    }
};