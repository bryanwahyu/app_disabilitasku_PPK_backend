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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('status')->default('Inctive');
            $table->string('email')->unique();
            $table->string('password');
            $table->date('date_of_birth');
            $table->string('avatar')->nullable();
            $table->string('cv')->nullable();
            $table->text('description')->nullable();
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
            $table->timestamp('verify_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
