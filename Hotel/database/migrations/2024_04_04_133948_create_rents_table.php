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
        Schema::create('rents', function (Blueprint $table) {
            $table->increments('id');
            $table->date('start_date');
            $table->date('end_date');
            $table->float('total');
            
            $table->integer('customer_id')->unsigned();
            $table->integer('seller_id')->unsigned();
            
            $table->integer('room_id')->unsigned();

            $table->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
                
            $table->foreign('seller_id')
                ->references('id')
                ->on('sellers')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

                $table->foreign('room_id')
                ->references('id')
                ->on('rooms')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rents');
    }
};
