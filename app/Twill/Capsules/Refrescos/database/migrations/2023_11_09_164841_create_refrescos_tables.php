<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefrescosTables extends Migration
{
    public function up()
    {
        Schema::create('refresco_participants', function (Blueprint $table) {
            createDefaultTableFields($table, true, false);
            $table->string('first_name', 200)->nullable();
            $table->string('last_name', 200)->nullable();
            $table->string('email', 200)->nullable();
            $table->boolean('acceptance_of_communications')->default(0);
        });

        Schema::create('refrescos', function (Blueprint $table) {
            createDefaultTableFields($table, true, false);
            $table->bigInteger('participant_id')->unsigned();
            $table->foreign('participant_id')->references('id')->on('refresco_participants')->onDelete('cascade');
            $table->index(['participant_id']);
            $table->bigInteger('wintime_id')->unsigned()->nullable();
        });

        Schema::create('refresco_prizes', function (Blueprint $table) {
            createDefaultTableFields($table, true, false);
            $table->string('title', 200)->nullable();
        });

        Schema::create('refresco_wintimes', function (Blueprint $table) {
            createDefaultTableFields($table, true, false);
            $table->string('title', 200)->nullable();
            $table->string('start_at')->nullable();
            $table->string('end_at')->nullable();
            $table->bigInteger('prize_id')->unsigned()->nullable();
        });

        Schema::create('refresco_emails', function (Blueprint $table) {
            createDefaultTableFields($table, true, true);
            $table->string('title', 300)->nullable();
            $table->string('subject', 300)->nullable();
            $table->text('body')->nullable();
            $table->string('preheader', 300)->nullable();
            $table->string('type', 100)->nullable();
        });
    }

    public function down()
    {
        
        Schema::dropIfExists('refresco_prize_wintime');
        Schema::dropIfExists('refresco_wintimes');
        Schema::dropIfExists('refrescos');
        Schema::dropIfExists('refresco_prizes');
        Schema::dropIfExists('refresco_participants');
        Schema::dropIfExists('refresco_emails');

    }
}
