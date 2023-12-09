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
        //
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string ('title', 225);
            $table->string('author', 225);
            $table->year('year');
            $table->string('publisher', 255);
            $table->string('city');
            $table->string('cover', 255)->nullable();
            $table->integer('quantity')->nullable();
            $table->unsignedBigInteger('bookshelf_id');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('bookshelf_id')->references('id')->on('bookshelfs');
            $table->foreign('category_id')->references('id')->on('categories');

            $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
