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
        Schema::create('forms', function (Blueprint $table) {   
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Foreign key linking to 'categories'
            $table->integer('lang_id');
            $table->string('language');
            $table->string('title');
            $table->text('description');
            $table->string('image');
            $table->date('date');
            $table->timestamps();
        });
        // index both lang_id and lang 
        Schema::table('forms', function (Blueprint $table) {
            $table->index(['lang_id', 'language']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forms');
    }
};
