<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_translations', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text("brief_description");
            $table->text("description");
            $table->unsignedBigInteger('blog_id');
            $table->string('locale')->index();
            $table->unique(['blog_id', 'locale'], 'blog_locale_id');
            $table->foreign('blog_id')->references('id')->on('blogs')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_translations');
    }
}
