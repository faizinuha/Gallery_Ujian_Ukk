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
        // Migration untuk tabel foto
        Schema::create('fotos', function (Blueprint $table) {
            $table->id('FotoID');
            $table->string('JudulFoto', 255);
            $table->text('DeskripsiFoto');
            $table->date('TanggalUnggah');
            $table->string('LokasiFile', 255);
            $table->unsignedBigInteger('AlbumID');
            $table->unsignedBigInteger('UserID');
            $table->timestamps();

            $table->foreign('AlbumID')->references('AlbumID')->on('albums')->onDelete('cascade');
            $table->foreign('UserID')->references('UserID')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fotos');
    }
};
