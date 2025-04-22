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
            $table->unsignedBigInteger('parent_id')->nullable()->after('id'); // Links to the original research
            $table->integer('version')->default(1)->after('parent_id'); // Tracks the version number
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('research_repositories', function (Blueprint $table) {
            $table->dropColumn(['parent_id', 'version']);
        });
    }
};
