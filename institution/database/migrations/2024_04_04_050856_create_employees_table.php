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
            $table->string('gender');
            $table->string('phone')->nullable();
            $table->string('email');
            $table->string('position');
            $table->float('salary');
            $table->string('immediate_boss');
            $table->integer('departament_id')->unsigned();

            $table->foreign('departament_id')
                ->references('id')
                ->on('departaments')
                ->onDelete('cascade');


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
