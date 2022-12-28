<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string("url");
            $table->longText("content");
            $table->boolean("is_active")->default(true)->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('pages');
    }
};
