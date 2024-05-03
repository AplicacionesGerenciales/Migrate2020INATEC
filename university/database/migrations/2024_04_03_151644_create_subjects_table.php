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
        Schema::create('subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('code_subject')->unique();
            $table->integer('teacher_id')->unsigned();

            $table->integer('section_id')->unsigned();

            $table->integer('career_id')->unsigned();

            $table->foreign('teacher_id' )->references( 'id' )->on( 'teachers' )->cascadeOnDelete()->cascadeOnUpdate();

            $table->foreign( 'section_id' )->references( 'id' )->on( 'sections' )->cascadeOnDelete()->cascadeOnUpdate();

            $table->foreign('career_id')->references('id')->on('careers')
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
        Schema::dropIfExists('subjects');
    }
};
