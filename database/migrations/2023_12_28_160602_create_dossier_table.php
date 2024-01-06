<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('dossiers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('name');
            $table->string('lastname');
            $table->string('email');
            $table->string('phonenumber');
            $table->string('avatar_url');
            $table->string('class')->nullable();
            $table->string('level')->nullable();
            $table->string('category')->nullable();
            $table->json('weekschema')->nullable();
            $table->json('results')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dossier');
    }
};
