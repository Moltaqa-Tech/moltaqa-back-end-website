<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortofolioCategoryTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portofolio_category_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('portofolio_category_id');
            $table->string('name');
            $table->string('locale')->index();

            $table->unique(['portofolio_category_id', 'locale'], 'proto_cat_locale_id');
            $table->foreign('portofolio_category_id')->references('id')->on('portofolio_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('portofolio_category_translations');
    }
}
