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
        Schema::table('research_repositories', function (Blueprint $table) {
            $table->foreignId('faculty_id')->nullable()->after('user_id')
                ->constrained('faculties')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('research_repositories', function (Blueprint $table) {
            $table->foreignId('faculty_id')->nullable()->after('user_id')
                ->constrained('faculties')->nullOnDelete();
        });
    }
};
