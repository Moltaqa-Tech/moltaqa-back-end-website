<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('review_id');
            $table->text("comment")->nullable();
            $table->string('locale')->index();
            $table->unique(['review_id', 'locale'], 'review_locale_id');
            $table->foreign('review_id')->references('id')->on('reviews')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('review_translations');
    }
}
