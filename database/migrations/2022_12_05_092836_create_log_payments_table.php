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
        Schema::create('log_payments', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->string('description')->nullable();
            $table->dateTime('time')->nullable();
            $table->bigInteger('order_id')->nullable();
            $table->string('number')->nullable();
            $table->decimal('amount', 16)->nullable();
            $table->string('method')->nullable();
            $table->string('status')->nullable();
            $table->string('token')->nullable();
            $table->longText('payloads')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('va_number')->nullable();
            $table->string('vendor_name')->nullable();
            $table->string('biller_code')->nullable();
            $table->string('bill_key')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_payments');
    }
};
