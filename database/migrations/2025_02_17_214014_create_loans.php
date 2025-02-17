<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->date('loan_date');
            $table->date('return_date');
            $table->enum('status', ['pending', 'returned', 'late'])->default('pending');
            $table->timestamps();

            $table->foreignId('user_id')->unsigned()
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreignId('book_id')->unsigned()
                ->references('id')->on('books')
                ->onDelete('cascade');
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
