<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLocationToTbProduk extends Migration
{
    public function up()
    {
        Schema::table('tb_produk', function (Blueprint $table) {
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
        });
    }

    public function down()
    {
        Schema::table('tb_produk', function (Blueprint $table) {
            $table->dropColumn(['latitude', 'longitude']);
        });
    }
}

