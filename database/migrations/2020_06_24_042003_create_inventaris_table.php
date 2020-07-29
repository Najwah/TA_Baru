<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventaris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barang_id')->nullable();
            $table->string('nomor_inventaris')->nullable();
            $table->year('tahun_perolehan');
            $table->foreignId('sumber_dana_id')->nullable();
            $table->string('kondisi');
            // $table->boolean('habis')->nullable();
            $table->string('tempat');
            $table->boolean('habis_pakai');
            $table->foreignId('peruntukan_id')->nullable();
            $table->string('peruntukan_type')->nullable();
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
        Schema::dropIfExists('inventaris');
    }
}
