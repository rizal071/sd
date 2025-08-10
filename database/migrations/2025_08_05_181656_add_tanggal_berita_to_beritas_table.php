<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up()
{
    Schema::table('beritas', function (Blueprint $table) {
        $table->date('tanggal_berita')->nullable()->after('judul');
    });
}

public function down()
{
    Schema::table('beritas', function (Blueprint $table) {
        $table->dropColumn('tanggal_berita');
    });
}
};
