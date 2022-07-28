<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->text('description');
            $table->string('convenient')->nullable();
            $table->string('image_path')->nullable();
            $table->string('status');
            $table->unsignedBigInteger('room_types_id');
            $table->foreign('room_types_id')
                ->references('id')
                ->on('room_types');
            $table->unsignedBigInteger('floor_id');
            $table->foreign('floor_id')
                ->references('id')
                ->on('floors');
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
        Schema::dropIfExists('rooms');
    }
};
