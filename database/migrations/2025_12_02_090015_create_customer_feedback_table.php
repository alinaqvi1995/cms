<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
            Schema::create('customer_feedback', function (Blueprint $table) {
                        $table->id();
                        $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
                        $table->unsignedTinyInteger('rating')->default(5);
                        $table->longText('message');
                        $table->timestamps();
                    });
    }

    public function down()
    {
        //
    }
};
