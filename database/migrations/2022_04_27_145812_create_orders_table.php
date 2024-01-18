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
        Schema::create('orders', function (Blueprint $table) {
            // $table->id();
            // $table->foreignId('schedule_id');
            // $table->foreignId('user_id');
            // $table->timestamps();

            $table->id();
            $table->string('status'); //
            // $table->foreignId('user_id');
            $table->string('uname')->nullable(); //
            $table->string('email')->nullable(); //
            $table->string('number')->nullable(); //
            // $table->foreignId('schedule_id');
            $table->string('status_web_notification')->default('not notified');
            $table->string('status_email_notification')->default('not notified');
            $table->string('transaction_id');
            $table->string('order_id');
            $table->string('gross_amount'); //
            $table->string('payment_type'); //
            $table->string('payment_code')->nullable();
            $table->string('pdf_url')->nullable();
            $table->foreignId('schedule_id')->constrained('schedules');
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();

            //ref-code
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
