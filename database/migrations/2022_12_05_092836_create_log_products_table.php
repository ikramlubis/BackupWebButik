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
        Schema::create('log_products', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->string('descriptiondata')->nullable();
            $table->dateTime('time')->nullable();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->integer('price')->nullable();
            $table->text('description')->nullable();
            $table->longText('details')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('quantity')->nullable();
            $table->boolean('status')->nullable();
            $table->tinyInteger('review_able')->nullable();
            $table->bigInteger('category_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_products');
    }
};
