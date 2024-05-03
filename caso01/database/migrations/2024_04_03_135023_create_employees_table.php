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
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('identification_card')->unique();
            $table->string('gender');
            $table->string('phone');
            $table->string('employee_code');

            $table->Integer('location_id')->unsigned();

            $table->foreign('location_id')
                ->references('id')
                ->on('locations')
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
        Schema::dropIfExists('employees');
    }
};
