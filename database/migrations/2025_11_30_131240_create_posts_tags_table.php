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
        Schema::create('posts_tags', function (Blueprint $table) {
            $table->id();
            $table->uuid('posts_id');
            $table->uuid('tags_id');
            $table->foreign("posts_id")->references('id')->on('posts')->cascadeOnDelete();
            $table->foreign("tags_id")->references('id')->on('tags')->cascadeOnDelete();
            $table->timestamps();
            $table->unique(['posts_id','tags_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts_tags');
    }
};
