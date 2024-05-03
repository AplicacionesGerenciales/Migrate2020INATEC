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
            $table->string('name');
            $table->text('description')->nullable();
            $table->date('start_time');
            $table->date('end_time');
            $table->integer('inscription_id')->unsigned();
            $table->integer('coach_id')->unsigned();
            
             
            $table->foreign('inscription_id')
                ->references('id')
                ->on('inscriptions')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

                $table->foreign('coach_id')
                      ->references('id')
                      ->on('coaches')
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
