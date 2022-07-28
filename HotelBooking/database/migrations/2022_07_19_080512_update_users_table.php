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
        Schema::table('users', function (Blueprint $table) {
            $table->string('birth_day');
            $table->string('address');
            $table->string('avatar')->nullable();
            $table->string('phone');
            $table->string('gender');
            $table->unsignedBigInteger('user_group_id');
            $table->foreign('user_group_id')->references('id')->on('user_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
