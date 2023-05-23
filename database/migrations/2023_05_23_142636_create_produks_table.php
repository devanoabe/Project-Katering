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
        Schema::create('produks', function (Blueprint $table) {
            $table->string('idProduk', 6)->primary();
            $table->string('namaProduk',10);
            $table->string('deskripsi', 100);
            $table->decimal('hargaProduk');
            $table->foreignIdFor(User::class)->constrained('users');
            $table->string('idKategori', 6);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
