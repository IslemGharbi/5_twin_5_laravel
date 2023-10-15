<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  // database/migrations/xxxx_xx_xx_create_events_table.php

public function up()
{
    Schema::create('events', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description');
        $table->dateTime('start_date');
        $table->dateTime('end_date');
        $table->string('location');
        $table->json('task')->nullable(); // Colonne pour stocker les données de la tâche
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
        Schema::dropIfExists('events');
    }
}
