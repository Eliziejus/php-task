<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
           $table->id();
            $table->string('subject');
            $table->enum('priority', ['high', 'medium', 'low']);
            $table->date('date');
            $table->enum('status', ['complate', 'In progress', 'new'])->default('new');
            $table->enum('percentCompleted', ['100%', '50%', '25%', '0%'])->default('0%');
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
        Schema::dropIfExists('tasks');
    }
}
