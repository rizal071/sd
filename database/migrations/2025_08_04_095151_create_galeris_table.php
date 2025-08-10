<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('galeris', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi')->nullable();
             $table->date('tanggal')->nullable();
            $table->string('gambar');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('galeris');
    }
};


