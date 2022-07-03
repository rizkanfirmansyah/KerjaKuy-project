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
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username')->unique();
            $table->string('full_name');
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone_number');
            $table->string('image');
            $table->string('attachment');
            $table->string('role')->default('user');
            $table->rememberToken();
            $table->timestamps();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade')->default(1);
            $table->foreignId('region_id')->constrained('regions')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
};
