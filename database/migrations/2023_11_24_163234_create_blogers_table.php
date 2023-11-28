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
        Schema::create('blogers', function (Blueprint $table) {
            $table->id();
            $table->string('FirstName');
            $table->string('LastName');
            $table->integer('Phone');
            $table->string('Category');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogers');
    }
};
