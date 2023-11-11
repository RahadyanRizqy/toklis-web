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
        Schema::create('electric_tokens', function (Blueprint $table) {
            $table->id();
            $table->string("token_number", 255);
            $table->boolean("token_status");
            $table->string("purchased_date");
            $table->integer("cost");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('electric_tokens');
    }
};
