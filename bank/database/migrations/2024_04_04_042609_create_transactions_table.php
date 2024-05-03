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
        Schema::create('transactions', function (Blueprint $table) {
            
            $table->increments('id');
            $table->datetime('date');
            $table->string('state');
            $table->string('transaction_type');
            $table->unsignedInteger('account_id');


            $table->foreign('account_id')
                ->references('id')->on('accounts')
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
        Schema::dropIfExists('transactions');
    }
};
