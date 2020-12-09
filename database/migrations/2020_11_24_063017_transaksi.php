<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Transaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pembeli_id')->constrained('pembeli');
            $table->foreignId('produk_id')->constrained('produk');
            $table->integer('jumlah');
            $table->integer('total_harga');
            $table->date('tgl_pembelian');
            $table->enum('jenis_kelamin', ['Sudah Bayar', 'Belum Bayar']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transaksi');
    }
}
