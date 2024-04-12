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
        Schema::create('articles_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("article_id");
            $table->unsignedBigInteger("tag_id");
            $table->foreign("article_id")->references("id")->on("articles");
            $table->foreign("tag_id")->references("id")->on("tags");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("articles_tags", function ($table) {
            $table->dropForeign("articles_tags_article_id_foreign");
            $table->dropForeign("articles_tags_tag_id_foreign");
        });
        Schema::dropIfExists('articles_tags');
    }
};