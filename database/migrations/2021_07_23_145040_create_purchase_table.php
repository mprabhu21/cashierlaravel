<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');            
            $table->string('stripe_id');
            $table->string('stripe_status');
            $table->string('stripe_customer');            
            $table->string('stripe_price');            
            $table->string('stripe_transaction');            
            $table->string('stripe_currency');            
            $table->string('stripe_payment_method');            
            $table->string('stripe_receipt_url');            
            $table->integer('quantity')->nullable();            
            $table->timestamps();        
            $table->index(['user_id', 'stripe_status', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase');
    }
}
