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
        Schema::create('log_shipments', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->dateTime('time')->nullable();
            $table->string('description')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('order_id')->nullable();
            $table->string('track_number')->nullable();
            $table->string('status')->nullable();
            $table->integer('total_qty')->nullable();
            $table->integer('total_weight')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('city_id')->nullable();
            $table->string('province_id')->nullable();
            $table->integer('postcode')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_shipments');
    }
};
