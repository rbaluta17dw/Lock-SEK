<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWhitelistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('whitelist', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('device');
            
            
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            
            $table->unsignedInteger('lock_id');
            $table->foreign('lock_id')->references('id')
            ->on('locks')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            
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
        Schema::dropIfExists('whitelist');
    }
}
