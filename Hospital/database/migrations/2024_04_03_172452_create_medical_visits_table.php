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
        Schema::create('medical_visits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->date('date');
            $table->time('hour');
            $table->integer('patient_id')->unsigned();

            $table->integer('doctor_id')->unsigned();


            $table->foreign('patient_id')
                ->references('id')
                ->on('patients')
                ->cascadeOnDelete()
                ->restrictOnUpdate();

                $table->foreign( 'doctor_id' )
                ->references( 'id' )
                ->on('doctors')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_visits');
    }
};
