<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique()->nullable();
            $table->string('mobile')->unique()->nullable();
            $table->string('password');
            $table->string('national_code')->unique()->nullable()->comment("code meli");
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('slug')->unique()->nullable()->comment("full name for profile slug route");
            $table->text('profile_photo_path')->nullable()->comment("avatar");
            $table->timestamp('email_verified_at')->nullable();
            $table->tinyInteger('activation')->default(0)->comment("this field is used to find out whether the user is active or inactive (email verified) (0 => inactive, 1 => active) ");
            $table->timestamp('activation_date')->nullable()->comment('get user activity time');
            $table->tinyInteger('user_type')->default(0)->comment("to find out if the user is an admin or a regular user (0 => user, 1 => admin) ");
            $table->tinyInteger('status')->default(0)->comment('0 => inactive and does not have access, 1 => active and does have access');
            $table->foreignId('current_team_id')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
