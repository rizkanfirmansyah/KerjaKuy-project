<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->integer('from');
            $table->foreignId('receiver')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('Company_id')->constrained('jobs')->onDelete('cascade')->onUpdate('cascade');
            $table->string('status');
            $table->string('date')->nullable();
            $table->string('request_    date')->nullable();
            $table->text('comment');
            $table->rememberToken();
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
        Schema::dropIfExists('messages');
    }
};
