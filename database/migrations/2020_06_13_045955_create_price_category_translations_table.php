<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceCategoryTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_category_translations', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->unsignedBigInteger('price_category_id');
            $table->string('locale')->index();
            $table->unique(['price_category_id', 'locale'], 'price_category_locale_id');
            $table->foreign('price_category_id')->references('id')->on('price_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('price_category_translations');
    }
}
