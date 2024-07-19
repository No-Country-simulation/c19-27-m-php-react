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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
<<<<<<<< HEAD:database/migrations/2024_07_15_195049_create_carts_table.php

            $table->integer('state');
            $table->foreignId('user_iduser')->constrained('users')->onDelete('cascade');
            
========
            $table->integer('state');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
>>>>>>>> origin/back_juan:database/migrations/2024_07_12_031039_create_carts_table.php
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
