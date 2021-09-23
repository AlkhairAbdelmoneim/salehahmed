<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceTable extends Migration
{

    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name' , 50);
            $table->longText('description');
            $table->string('image')->default('image.png');
            $table->timestamps();
        });
        
    }
    public function down()
    {
        Schema::dropIfExists('_service');
    }
}
