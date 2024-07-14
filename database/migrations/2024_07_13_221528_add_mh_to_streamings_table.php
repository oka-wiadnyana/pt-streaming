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
        Schema::table('streamings', function (Blueprint $table) {
            $table->string('klasifikasi_perkara')->nullable()->after('jenis_perkara');
            $table->string('hk')->nullable()->after('klasifikasi_perkara');
            $table->string('ha1')->nullable()->after('hk');
            $table->string('ha2')->nullable()->after('ha1');
            $table->string('pp')->nullable()->after('ha2');
            $table->string('pukul')->nullable()->after('tanggal_sidang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('streamings', function (Blueprint $table) {
            $table->dropColumn('klasifikasi_perkara');
            $table->dropColumn('hk');
            $table->dropColumn('ha1');
            $table->dropColumn('ha2');
            $table->dropColumn('pp');
            $table->dropColumn('pukul');
        });
    }
};
