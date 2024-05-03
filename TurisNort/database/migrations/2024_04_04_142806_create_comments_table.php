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
        Schema::create('comments', function (Blueprint $table) {

            $table->increments('id');
            $table->datetime('date');
            $table->text('description');

           
                $table->integer('tourist_id')
            ->unsigned();

            $table->integer('post_id')
            ->unsigned();

            $table->foreign('tourist_id')
                ->references('id')
                ->on('tourists')
                ->onDelete('cascade')
                ->onUpdate('cascade');

                $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onDelete('cascade')
                ->onUpdate('cascade');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
