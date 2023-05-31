<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->increments('idPesanan');
            $table->foreignIdFor(User::class)->constrained('users');
            $table->string('idProduk', 6);
            $table->date('tglPemesanan');
            $table->date('tglPengambilan');
            $table->integer('jumlahPesanan');
            $table->decimal('totalHarga');
            $table->string('status')->default('diproses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
