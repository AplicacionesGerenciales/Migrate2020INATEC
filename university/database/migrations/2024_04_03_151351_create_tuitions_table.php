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
        Schema::create('tuitions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('career_year');

            $table->date('date');
            $table->integer('student_id')->unsigned();

            $table->integer('career_id')->unsigned();


            $table->foreign('student_id')
               ->references('id')
                ->on('students')
                  ->onDelete('cascade');

                  $table->foreign('career_id')
                  ->references('id')
                   ->on('careers')
                     ->onDelete('cascade');
           
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tuitions');
    }
};
