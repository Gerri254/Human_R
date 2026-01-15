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
        Schema::table('articles', function (Blueprint $table) {
            // Drop the duplicate 'content' column if it was added (it was nullable)
            if (Schema::hasColumn('articles', 'content')) {
                $table->dropColumn('content');
            }
            
            // Rename the original 'content_body' to 'content'
            if (Schema::hasColumn('articles', 'content_body')) {
                $table->renameColumn('content_body', 'content');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->renameColumn('content', 'content_body');
        });
    }
};