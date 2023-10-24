<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillsTable extends Migration
{
  
public function up(){Schema::create('skills', function (Blueprint $table) {$table->id();
        $table->string('name');$table->string('level');$table->unsignedBigInteger('freelancer_id');$table->foreign('freelancer_id')->references('id')->on('freelancers');$table->timestamps();});}

   

public function down(){Schema::dropIfExists('skills');}
}