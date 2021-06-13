<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->uuid('id_penjualan')->primary();
            $table->string('id_buku');
            $table->foreignId('id_kasir');
            $table->unsignedInteger('jumlah_beli');
            $table->integer('bayar');
            $table->integer('kembalian');
            $table->integer('total_harga');
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
