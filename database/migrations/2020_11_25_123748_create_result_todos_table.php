<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('result_todos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('todo_id');
            $table->string('title', 100);
            $table->text('desc');
            $table->timestamp('start_date');
            $table->timestamp('due_date');
            $table->timestamp('finished_date');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('result_todos');
    }
}
