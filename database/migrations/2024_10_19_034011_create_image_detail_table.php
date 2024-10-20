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
        Schema::create('image_detail', function (Blueprint $table) {
            $table->id();
            $table->integer('image_id');
            $table->string('src');
            $table->longText('describe');
            $table->longText('describe_en');
            $table->integer('display')->default(1);
            $table->integer('location')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image_detail');
    }
};
