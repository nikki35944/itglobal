<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->dateTime('due_time');
            $table->dateTime('completion_time')->nullable();
            $table->timestamps();

            $table->softDeletes();

            $table->unsignedBigInteger('status_id')->nullable();
            $table->index('status_id', 'task_status_idx');
            $table->foreign('status_id', 'task_status_fk')->on('statuses')->references('id');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->index('user_id', 'task_user_idx');
            $table->foreign('user_id', 'task_user_fk')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
