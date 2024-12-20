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
        Schema::create('introduce', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('name_en');
            $table->longText('content');
            $table->longText('content_en');
            $table->string('src')->nullable();
            $table->integer('index')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('introduce');
    }
};
