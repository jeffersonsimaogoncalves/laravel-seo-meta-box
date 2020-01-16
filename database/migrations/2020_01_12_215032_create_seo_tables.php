<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeoTables extends Migration
{
    public function up()
    {
        Schema::create('seo_meta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('object_id')->nullable();
            $table->string('slug')->nullable();
            $table->string('type');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('seo_meta');
    }
}
