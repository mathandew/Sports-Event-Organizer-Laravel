<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchSchedulesTable extends Migration
{
    public function up()
    {
        Schema::create('match_schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('team1_id');
            $table->unsignedBigInteger('team2_id');
            $table->time('match_time');
            $table->string('venue');
            $table->integer('team1_score')->nullable();
            $table->integer('team2_score')->nullable();
            $table->enum('result', ['team1', 'team2', 'draw'])->nullable();
            $table->enum('match_type', ['group', 'semi_final', 'final'])->default('group');
            $table->unsignedBigInteger('winner_team_id')->nullable();  // Reference to the winning team
                
            $table->timestamps();
            
            $table->foreign('winner_team_id')->references('id')->on('teams')->onDelete('set null');

            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->foreign('team1_id')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('team2_id')->references('id')->on('teams')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('match_schedules');
    }
}
