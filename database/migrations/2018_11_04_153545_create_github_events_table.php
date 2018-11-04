<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGithubEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('github_events', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('event_id')->unique();
            $table->string('event_type');
            $table->string('repo_name');
            $table->string('repo_url');
            $table->string('actor_name');
            $table->string('actor_url');
            $table->timestamp('event_created_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('github_events');
    }
}
