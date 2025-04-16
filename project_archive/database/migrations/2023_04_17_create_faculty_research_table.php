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
        // Check if the table already exists
        if (!Schema::hasTable('faculty_research')) {
            Schema::create('faculty_research', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained()->onDelete('cascade');
                $table->string('project_name');
                $table->string('members');
                $table->string('department');
                $table->text('abstract');
                $table->string('banner_image')->nullable();
                $table->string('file');
                $table->boolean('approved')->default(false);
                $table->boolean('rejected')->default(false);
                $table->text('rejection_reason')->nullable();
                $table->integer('view_count')->default(0);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faculty_research');
    }
};