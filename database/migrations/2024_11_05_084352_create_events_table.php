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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->time('time');
            $table->string('venue');
            $table->integer('max_teams_allowed');
            $table->decimal('entry_fee', 8, 2)->nullable();
            $table->text('prize_details');
            $table->text('rules_and_regulations');
            $table->string('contact');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Foreign key constraint
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events'); // Drop the entire table when rolling back
    }
};
