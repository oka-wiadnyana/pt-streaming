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
        Schema::create('streamings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nomor_perkara');
            $table->string('jenis_perkara');
            $table->date('tanggal_sidang');
            $table->text('link_streaming')->nullable();
            $table->text('amar_putusan')->nullable();
            $table->text('doc_putusan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('streamings');
    }
};
