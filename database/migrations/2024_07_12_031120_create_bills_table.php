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
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
<<<<<<<< HEAD:database/migrations/2024_07_15_195033_create_bills_table.php

            $table->timestamp('date');
            $table->float('total');
            $table->boolean('state');
            $table->foreignId('user_iduser')->constrained('users')->onDelete('cascade');
            
========
            $table->timestamp('date');
            $table->float('total');
            $table->boolean('state');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
>>>>>>>> origin/back_juan:database/migrations/2024_07_12_031120_create_bills_table.php
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
