<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Track', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('lyrics')->nullable();
            $table->text('description')->nullable();
            $table->integer('album_id')->unsigned()->nullable();
            $table->integer('uploaded_by')->unsigned()->nullable();
            $table->foreign('album_id')->references('id')->on('Album')->onDelete('set null');
            $table->foreign('uploaded_by')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('Track');
    }
}
