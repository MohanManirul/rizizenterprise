<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCircleImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('circle_images', function (Blueprint $table) {
            $table->increments('id');
            $table->text('slogan');
            $table->string('imageOne');
            $table->string('imageTwo');
            $table->string('imageThree');
            $table->string('imageFour');
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
        Schema::dropIfExists('circle_images');
    }
}
