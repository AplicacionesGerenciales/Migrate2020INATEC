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
        Schema::create('activities', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name',100);
            $table->text('description')->nullable();
            $table->string('type',100);
            $table->string('schedule');
            $table->string('duration')->nullable();
    
            $table->binary('image')->nullable();

            $table->unsignedInteger('touristPlace_id');
            
            $table->foreign('touristPlace_id')
                ->references('id')
                ->on('tourist_places')
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
        Schema::dropIfExists('activities');
    }
};
