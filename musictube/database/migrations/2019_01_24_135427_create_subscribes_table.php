<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscribesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Subscribe', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedSmallInteger('receive_notification')->default(0);
            $table->unsignedSmallInteger('premium')->default(0);
            $table->integer('subscriber_id')->unsigned();
            $table->foreign('subscriber_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('subscribed_to_id')->unsigned();
            $table->foreign('subscribed_to_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('Subscribe');
    }
}
