<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('guitar_id')->unsigned()->index();
            $table->foreign('guitar_id')->references('id')->on('products')->onDelete('cascade');
            $table->integer("user_id")->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
            $table->string("review");
            $table->integer("star");
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
        Schema::dropIfExists('reviews');
    }
}
