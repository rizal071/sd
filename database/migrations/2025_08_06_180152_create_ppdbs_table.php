<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
{
    Schema::create('ppdbs', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('nisn')->nullable();
        $table->date('tgl_lahir');
        $table->text('alamat');
        $table->string('nama_ortu');
        $table->string('telepon');
        $table->string('pekerjaan_ortu')->nullable();
        $table->string('pendidikan_ortu')->nullable();
        $table->string('penghasilan_ortu')->nullable();
        $table->timestamps();
    });
}
};
