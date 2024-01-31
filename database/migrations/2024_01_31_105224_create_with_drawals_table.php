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
        Schema::create('with_drawals', function (Blueprint $table) {
            $table->id();
            $table->string('sender_user_name');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('nominal');
            $table->enum('status', ['Proses', 'Selesai', 'Ditolak']);
            $table->string('nomor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('with_drawals');
    }
};
