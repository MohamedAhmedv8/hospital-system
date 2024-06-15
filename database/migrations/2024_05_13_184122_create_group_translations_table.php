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
        Schema::create('group_translations', function (Blueprint $table) {
            $table->id();
            $table->string('locale')->index();
            $table->string('name')->unique();
            $table->string('description')->nullable();
            $table->unique(['group_id', 'locale']);
            $table->foreignId('group_id')->references('id')->on('groups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_translations');
    }
};
