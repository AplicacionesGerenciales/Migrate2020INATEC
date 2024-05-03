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
        Schema::create('tourists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('phone',20)->nullable(true);
            $table->string('gender',20);
            $table->string('state',50);
            $table->integer('age');
            $table->date('birthday');
            $table->string('origin',100);
            $table->binary( 'image' )->nullable();

            $table->integer('id_user')->unsigned();

            $table->foreign('id_user')
                ->references('id')
                ->on('users1')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tourists');
    }
};
