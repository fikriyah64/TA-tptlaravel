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
            $table->char("tpt01",1 );
            $table->char("tpt02",1 );
            $table->char("tpt03",1 );
            $table->char("tpt04",1 );
            $table->char("status",1 );
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
