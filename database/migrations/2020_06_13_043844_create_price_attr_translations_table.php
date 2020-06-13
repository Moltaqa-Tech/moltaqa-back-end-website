<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceAttrTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_attr_translations', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->unsignedBigInteger('price_attr_id');
            $table->string('locale')->index();
            $table->unique(['price_attr_id', 'locale'], 'price_attr_locale_id');
            $table->foreign('price_attr_id')->references('id')->on('price_attrs')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('price_attr_translations');
    }
}
