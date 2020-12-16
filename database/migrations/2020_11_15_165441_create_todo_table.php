<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('title', 100);
            $table->text('desc');
            $table->enum('status', ['unfinish', 'finish']);
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
        });

        Schema::table('todo', function (Blueprint $table) {
            $table->smallInteger('status')->change();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todo');
    }
}
