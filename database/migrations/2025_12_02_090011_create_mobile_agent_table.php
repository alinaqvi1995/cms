<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('mobile_agent', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->unsignedBigInteger('type_id');
            $table->string('avatar')->nullable();
            $table->longText('description')->nullable();
            $table->string('address');
            $table->unsignedTinyInteger('status')->default(1);
            $table->timestamps();
            $table->string('device_token')->nullable();
        });
    }

    public function down()
    {
        //
    }
};
