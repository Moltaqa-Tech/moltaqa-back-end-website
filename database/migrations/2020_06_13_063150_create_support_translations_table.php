<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('support_translations', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("description");
            $table->string("location")->nullable();
            $table->unsignedBigInteger('support_id');
            $table->string('locale')->index();
            $table->unique(['support_id', 'locale'], 'support_locale_id');
            $table->foreign('support_id')->references('id')->on('supports')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('support_translations');
    }
}
