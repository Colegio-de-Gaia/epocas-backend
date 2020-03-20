<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('days', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('epoch_id')->unsigned();
            $table->date('date')->unique();
            $table->string('sentence');
            $table->string('sentence_author', 100);
            $table->longText('pray');
            $table->longText('reflection');
            $table->string('photo_path');
            $table->string('photo_author', 70);
            $table->timestamps();

            $table->foreign('epoch_id')->references('id')->on('epochs')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('days');
    }
}
