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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string("recipeName");
            $table->string("imageURL");
            $table->string("description");
            $table->date("dateAdded");
            $table->boolean("isGlutenFree");
            $table->double("prepTime",8,2);
            $table->double("easyOfPrep",8,2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
