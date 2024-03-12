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
        Schema::create('banners', function (Blueprint $table) {
            $table->bigIncrements('ban_id');
            $table->string('ban_title',100)->nullable();
            $table->string('ban_subtitle',250)->nullable();
            $table->string('ban_button',20)->nullable();
            $table->string('ban_url',200)->nullable();
            $table->string('ban_image',50)->nullable();
            $table->integer('ban_creator')->nullable();
            $table->integer('ban_editor')->nullable();
            $table->string('ban_slug',30)->nullable();
            $table->integer('ban_status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
