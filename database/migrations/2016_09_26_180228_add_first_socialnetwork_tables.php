<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFirstSocialnetworkTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table) {
            $table->integer('profile_id')->nullable();
        });

        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->references('id')->on('users');
            $table->integer('profile_details_id')->references('id')->on('profile_details')->nullable();;
            $table->integer('avatar_gallery_id')->references('galleryable_id')->on('galleries')->nullable();;
            $table->integer('coverphoto_gallery_id')->references('galleryable_id')->on('galleries')->nullable();;
            $table->boolean('online');
            $table->boolean('active');
            $table->boolean('public');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('profile_details', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_of_birth')->nullable();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('nickname')->nullable();
            $table->string('country')->nullable();
            $table->string('region')->nullable();
            $table->string('city')->nullable();
            $table->integer('profile_id')->references('id')->on('profiles');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('content');
            $table->boolean('public');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('galleries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->boolean('public');

            $table->morphs('galleryable')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('media', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->string('path');
            $table->integer('gallery_id')->references('id')->on('galleries');
            $table->string('type');
            $table->boolean('public');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('content');

            $table->morphs('commentable');

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
        Schema::drop('profiles');
        Schema::drop('posts');
        Schema::drop('galleries');
        Schema::drop('media');
        Schema::drop('comments');

        Schema::table('users', function($table) {
            $table->dropColumn('profile_id')->nullable();
        });
    }
}
