<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('nisn');
            $table->enum('gender',['Perempuan', 'Laki-Laki']);
            $table->string('name');
            $table->string('school');
            $table->string('email')->unique();
            $table->string('phone_number')->unique();
            $table->enum('minat_jurusan', ['PPLG','DKV','PMN','MPLB','HTL','TJKT','KLN']);
            $table->enum('role', ['admin', 'user']);
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
