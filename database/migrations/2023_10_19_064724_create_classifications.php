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
        Schema::create('classifications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("nik");
            $table->string("nama");
            $table->char("jenis_kelamin");
            $table->string("kecamatan");
            $table->string("tpt01");
            $table->string("tpt02");
            $table->string("tpt03");
            $table->string("tpt04");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classifications');
    }
};
