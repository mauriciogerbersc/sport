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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('season');
            $table->string('status');
            $table->integer('period');
            $table->string('time');
            $table->boolean('postseason');
            $table->integer('home_team_score');
            $table->integer('visitor_team_score');
            
            $table->foreignId('home_team')->nullable()->references('id')->on('teams');
            $table->foreignId('visitor_team')->nullable()->references('id')->on('teams');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
