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
         Schema::create('jadwal', function (Blueprint $table) {
            $table->id();

            $table->string('kode_matakuliah', 10);
            $table->string('nidn', 20);

            $table->string('kelas');
            $table->string('hari');
            $table->time('jam');

            $table->timestamps();

            $table->foreign('kode_matakuliah')
                ->references('kode_matakuliah')
                ->on('matakuliah')
                ->cascadeOnDelete();

            $table->foreign('nidn')
                ->references('nidn')
                ->on('dosen')
                ->cascadeOnDelete();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};
