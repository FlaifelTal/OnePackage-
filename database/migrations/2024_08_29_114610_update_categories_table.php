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
            // Drop existing columns if needed
            // add if to check for columns 
            // dont do this let them add alone each cat by user 

            $table->string('type');
    
            // $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     * 
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->string('type')->nullable();
          
        });    }
};
