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
        Schema::create('log_orders', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->string('description')->nullable();
            $table->dateTime('time')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->string('code')->nullable();
            $table->string('status')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('payment_token')->nullable();
            $table->string('payment_url')->nullable();
            $table->decimal('base_total_price', 16)->nullable();
            $table->decimal('tax_amount', 16)->nullable();
            $table->decimal('tax_percent', 16)->nullable();
            $table->decimal('discount_amount', 16)->nullable();
            $table->decimal('discount_percent', 16)->nullable();
            $table->decimal('shipping_cost', 16)->nullable();
            $table->decimal('grand_total', 16)->nullable();
            $table->text('note')->nullable();
            $table->string('customer_first_name')->nullable();
            $table->string('customer_last_name')->nullable();
            $table->string('customer_address1')->nullable();
            $table->string('customer_address2')->nullable();
            $table->string('customer_phone')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('customer_city_id')->nullable();
            $table->string('customer_province_id')->nullable();
            $table->integer('customer_postcode')->nullable();
            $table->string('shipping_courier')->nullable();
            $table->string('shipping_service_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_orders');
    }
};
