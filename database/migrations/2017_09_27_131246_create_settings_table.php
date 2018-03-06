<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url', 255);
            $table->string('logo', 255);
            $table->string('admin_email', 255)->nullable();
            $table->string('app_store_url', 255)->nullable();
            $table->string('play_store_url', 255)->nullable();
            $table->string('info_email', 255)->nullable();
            $table->string('mobile', 20)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('facebook', 255)->nullable();
            $table->string('twitter', 255)->nullable();
            $table->string('linked_in', 255)->nullable();
            $table->string('instagram', 255)->nullable();
            $table->string('google_plus', 255)->nullable();
            $table->string('pinterest', 255)->nullable();
            $table->string('attitude', 255)->default(29.31166);
            $table->string('longitude', 255)->default(47.48176599999999);
            $table->string('note', 255)->nullable();
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
        Schema::dropIfExists('settings');
    }
}
