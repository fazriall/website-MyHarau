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
        Schema::create('akomodasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('tipe', ['Penginapan', 'Kendaraan']);
            $table->text('deskripsi')->nullable();
            $table->string('foto')->nullable();
            $table->string('alamat')->nullable();
            $table->string('telepon')->nullable();
            $table->string('jenis_penginapan')->nullable(); // khusus penginapan
            $table->string('jenis_kendaraan')->nullable();  // khusus kendaraan
            $table->string('kapasitas')->nullable();         // untuk kendaraan
            $table->string('fasilitas')->nullable();         // untuk penginapan
            $table->decimal('harga', 12, 2)->default(0);
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akomodasis');
    }
};
