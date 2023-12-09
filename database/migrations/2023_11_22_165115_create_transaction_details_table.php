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
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->foreignId('header_id')->references('id')->on('transaction_headers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('food_id')->references('id')->on('foods')->onDelete('cascade')->onUpdate('cascade');
            // $table->integer('header_id');
            // $table->integer('food_id');
            $table->primary(['header_id', 'food_id']);
            $table->integer('qty');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_details');
    }
};
