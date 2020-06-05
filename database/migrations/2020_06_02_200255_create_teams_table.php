<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->string("job_title")->nullable();
            $table->string("image_path")->nullable();
            $table->string("instagram_url")->nullable();
            $table->string("whatsapp_url")->nullable();
            $table->string("twitter_url")->nullable();
            $table->string("facebook_url")->nullable();
            $table->unsignedTinyInteger("status")->default(1);
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
        Schema::dropIfExists('teams');
    }
}
