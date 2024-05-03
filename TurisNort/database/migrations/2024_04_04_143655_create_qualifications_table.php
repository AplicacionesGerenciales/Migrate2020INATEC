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
        Schema::create('qualifications', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->integer('qualification');

            $table->unsignedInteger('touristPlace_id');

            $table->unsignedInteger('tourist_id');
            
            $table->foreign('touristPlace_id')
                ->references('id')
                ->on('tourist_places')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

                $table->foreign('tourist_id')->references('id')->on('tourists')
                      ->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qualifications');
    }
};
