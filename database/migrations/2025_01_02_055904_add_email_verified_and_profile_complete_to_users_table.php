<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->boolean('email_verified')->default(false)->after('verification_status');
        $table->boolean('profile_complete')->default(false)->after('email_verified');
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn(['email_verified', 'profile_complete']);
    });
}

};
