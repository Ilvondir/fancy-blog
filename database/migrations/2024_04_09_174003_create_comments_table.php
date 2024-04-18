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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text("content");
            $table->date("written");
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("article_id");
            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("article_id")->references("id")->on("articles")->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("comments", function ($table) {
            $table->dropForeign("comments_user_id_foreign");
            $table->dropForeign("comments_article_id_foreign");
        });
        Schema::dropIfExists('comments');
    }
};