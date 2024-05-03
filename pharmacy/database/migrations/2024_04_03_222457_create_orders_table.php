<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('state');

            $table->Integer('supplier_id')->unsigned();
             
            $table->unsignedInteger('medicine_id');

            $table->unsignedInteger('customer_id');

            $table->foreign('supplier_id')->references('id')->on('suppliers')
               ->cascadeOnDelete()->restrictOnUpdate();
            $table->timestamps();

           $table->foreign('medicine_id')->references('id')
           ->on('medicines')
           ->onDelete('cascade')
           ->onUpdate('cascade');

           $table->foreign('customer_id')
           ->references('id')
           ->on('customers')
           ->onDelete('cascade');
           
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
