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
        Schema::create('data_obats', function (Blueprint $table) {
            $table->id();
            $table->string('nama_obat', 255);
            $table->enum('golongan_obat', ['Obat Bebas', 'Obat Bebas Terbatas', 'Obat Keras', 'Obat Psikotropika dan Narkotika']);
            $table->unsignedBigInteger('kategori_id');
            $table->foreign('kategori_id')->references('id')->on('kategori_obats')->onDelete('cascade');
            $table->date('kadaluwarsa');
            $table->string('produsen', 255);
            $table->integer('harga_satuan');
            $table->integer('stok');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_obats');
    }
};
