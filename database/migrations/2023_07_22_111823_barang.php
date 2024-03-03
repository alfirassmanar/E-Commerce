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
        Schema::create('tblBarang', function (Blueprint $table) {
            $table->id();
            $table->integer('idJenis');
            $table->string('namaBarang')->nullable();
            $table->string('harga')->nullable();
            $table->string('stok')->nullable();
            $table->string('img_produk')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblBarang');
    }
};