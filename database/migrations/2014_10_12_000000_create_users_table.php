<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 10)->nullable();
            $table->string('name')->index()->nullable();
            $table->string('username')->index()->nullable();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->text('website')->nullable();
            $table->integer('image_id')->unsigned()->nullable();
            $table->foreign('image_id')
                ->references('id')
                ->on('images')
                ->onDelete('cascade');
            $table->integer('is_active')->unsigned()->default(1);
            $table->dateTime('last_active')->nullable();
            $table->string('last_ip', 200)->nullable();
            $table->integer('address_id')->unsigned()->nullable();
            $table->foreign('address_id')
                ->references('id')
                ->on('addresses');
            /*$table->integer('role_id')->unsigned()->nullable();
            $table->foreign('role_id')
                ->references('id')
                ->on('roles');*/
            $table->string('token')->nullable();
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
