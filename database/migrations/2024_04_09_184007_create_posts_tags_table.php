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
            $table->unsignedBigInteger("post_id");
            $table->unsignedBigInteger("tag_id");
            $table->foreign("post_id")->references("id")->on("users");
            $table->foreign("tag_id")->references("id")->on("tags");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("posts_tags", function ($table) {
            $table->dropForeign("posts_tags_post_id_foreign");
            $table->dropForeign("posts_tags_tag_id_foreign");
        });
        Schema::dropIfExists('posts_tags');
    }
};