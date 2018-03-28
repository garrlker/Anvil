<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_settings', function(Blueprint $table){
            $table->increments('id');
            $table->uuid('user_id')->unique();
            $table->boolean('theme')->default(0);
            $table->boolean('2fa_enabled')->default(0);
            $table->string('github_access_token')->default('');
            $table->string('bitbucket_access_token')->default('');
            $table->string('gitlab_access_token')->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_settings');
    }
}
