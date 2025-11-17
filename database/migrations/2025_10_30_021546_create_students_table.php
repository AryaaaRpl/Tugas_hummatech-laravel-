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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('phone')->unique();
            $table->string('email')->unique();
            $table->enum('kelas', ['RPL', 'TKJ', 'MP', 'AK', 'BD', 'Logistik', 'PH', 'DKV', 'Pariwisata']);
            $table->enum('gender', ['Laki-laki', 'Perempuan', 'Rahasia']);
            $table->integer('nisn')->unique();
            $table->integer('major_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
