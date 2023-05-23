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
        Schema::create('historis', function (Blueprint $table) {
            $table->string('idHistoris', 6)->primary();
            $table->string('idPesanan', 6);
            $table->string('idUser', 6);
            $table->string('idProduk', 6);
            $table->date('tglPemesanan');
            $table->date('tglPengambilan');
            $table->integer('jumlahPesanan');
            $table->decimal('totalHarga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historis');
    }
};
