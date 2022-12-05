<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_reviews', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->string('description')->nullable();
            $table->dateTime('time')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('product_id')->nullable();
            $table->text('content')->nullable();
            $table->boolean('status')->nullable();
            $table->tinyInteger('rating')->nullable();
            $table->string('ip_address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_reviews');
    }
};
