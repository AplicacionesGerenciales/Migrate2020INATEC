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
        Schema::create('loans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('state');
            $table->date('start_date');
            $table->date('end_date');

            $table->unsignedInteger('book_id');

            $table->unsignedInteger('afilliate_id');

            $table->foreign( 'book_id' )->references( 'id' )->on( 'books' );

            $table->foreign('afilliate_id')->references( 'id' )->on( 'afilliates' );





            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
