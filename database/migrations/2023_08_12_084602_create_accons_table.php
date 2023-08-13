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
        Schema::create('accons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');            
            $table->string('noHp');
            $table->string('image')->nullable();
            $table->string('lokasi');
            $table->string('jenis_kelamin');            
            $table->string('foto_ktp');
            $table->text('body')->nullable();
            $table->timestamps();            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accons');
    }
};
