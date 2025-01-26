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
        Schema::create('albums', function (Blueprint $table) {
            $table->id('AlbumID');
            $table->string('NamaAlbum', 255);
            $table->text('Deskripsi');
            $table->date('TanggalDibuat');
            $table->timestamps();
            $table->unsignedBigInteger('UserID');
            $table->foreign('UserID')->references('UserID')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('albums');
    }
};
