<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supports', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("description");
            $table->string("location")->nullable();
            $table->string("email")->nullable();
            $table->string("phone")->nullable();
            $table->string("locale")->default("en");
            $table->unsignedTinyInteger("status")->default(1);
            $table->unsignedInteger("main_contact")->default(0);
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
        Schema::dropIfExists('supports');
    }
}
