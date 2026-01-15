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
            // Check if columns exist before adding them to avoid duplicate column errors
            if (!Schema::hasColumn('articles', 'content')) {
                $table->longText('content')->nullable()->after('title');
            }
            if (!Schema::hasColumn('articles', 'excerpt')) {
                $table->text('excerpt')->nullable()->after('title');
            }
             if (!Schema::hasColumn('articles', 'read_time')) {
                $table->integer('read_time')->default(5);
            }
             if (!Schema::hasColumn('articles', 'category_id')) {
                $table->integer('category_id')->default(1);
            }
             if (!Schema::hasColumn('articles', 'slug')) {
                $table->string('slug')->unique()->after('title');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn(['content', 'excerpt', 'read_time', 'category_id', 'slug']);
        });
    }
};