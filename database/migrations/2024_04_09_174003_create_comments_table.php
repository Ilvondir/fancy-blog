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
            $table->unsignedBigInteger("post_id");
            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("post_id")->references("id")->on("posts");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("comments", function ($table) {
            $table->dropForeign("comments_user_id_foreign");
            $table->dropForeign("comments_post_id_foreign");
        });
        Schema::dropIfExists('comments');
    }
};