<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('description');
            $table->text('content');
            $table->string('image');
            $table->string('image1');
            $table->integer('category_id');
            $table->integer('category_store_id');
            $table->string('fname');
            $table->string('lname');
            $table->string('city_name');
            $table->string('amphur');
            $table->string('district');
            $table->string('postcode');
            $table->string('lat');
            $table->string('long');
            $table->string('tel');
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
        Schema::dropIfExists('posts');
    }
}
