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
        // If the table already exists but has the wrong columns
        if (Schema::hasTable('research')) {
            Schema::table('research', function (Blueprint $table) {
                // Add missing columns if they don't exist
                if (!Schema::hasColumn('research', 'project_name')) {
                    $table->string('project_name');
                }
                if (!Schema::hasColumn('research', 'members')) {
                    $table->text('members');
                }
                if (!Schema::hasColumn('research', 'department')) {
                    $table->string('department');
                }
                if (!Schema::hasColumn('research', 'abstract')) {
                    $table->text('abstract');
                }
                if (!Schema::hasColumn('research', 'user_id')) {
                    $table->foreignId('user_id')->constrained();
                }
                if (!Schema::hasColumn('research', 'type')) {
                    $table->string('type')->default('faculty');
                }
                if (!Schema::hasColumn('research', 'status')) {
                    $table->string('status')->default('Pending');
                }
                if (!Schema::hasColumn('research', 'file_path')) {
                    $table->string('file_path');
                }
                if (!Schema::hasColumn('research', 'banner_image')) {
                    $table->string('banner_image')->nullable();
                }
                if (!Schema::hasColumn('research', 'rejection_reason')) {
                    $table->text('rejection_reason')->nullable();
                }
            });
        } 
        // If the table doesn't exist, create it
        else {
            Schema::create('research', function (Blueprint $table) {
                $table->id();
                $table->string('project_name');
                $table->text('members');
                $table->string('department');
                $table->text('abstract');
                $table->foreignId('user_id')->constrained();
                $table->string('type')->default('faculty'); // faculty, student, etc.
                $table->string('status')->default('Pending');
                $table->string('file_path');
                $table->string('banner_image')->nullable();
                $table->text('rejection_reason')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Don't drop the table in down() to avoid data loss
        // Just remove the columns we added if necessary
    }
};