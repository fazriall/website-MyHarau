<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('pusat_bantuans', function (Blueprint $table) {
        $table->id();
        $table->string('nama_tempat');
        $table->string('kategori'); // contoh: Bengkel, Klinik, Polisi, dll
        $table->string('alamat');
        $table->string('telepon');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pusat_bantuans');
    }
};
