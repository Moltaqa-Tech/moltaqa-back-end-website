<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttrCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attr_category', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger("active")->default(0);
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('attr_id');

            $table->foreign('category_id')->references('id')->on('price_categories')
                ->onDelete('cascade');
            $table->foreign('attr_id')->references('id')->on('price_attrs')
                ->onDelete('cascade');

                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attr_category');
    }
}
