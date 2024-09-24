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
        Schema::table('categories', function (Blueprint $table) {
            // Add a new nullable column 'parent_id' that is an unsigned integer
            $table->unsignedBigInteger('parent_id')->nullable()->after('id');
            
            // Optionally, add a foreign key constraint to ensure 'parent_id' references 'id' in the same table
            $table->foreign('parent_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            // Drop the foreign key constraint if it exists
            $table->dropForeign(['parent_id']);
            // Remove the 'parent_id' column
            $table->dropColumn('parent_id');
        });
    }
};
