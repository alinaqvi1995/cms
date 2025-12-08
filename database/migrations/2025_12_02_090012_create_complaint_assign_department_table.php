<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
            Schema::create('complaint_assign_department', function (Blueprint $table) {
                        $table->id();
                        $table->foreignId('complaint_id')->constrained('complaint')->cascadeOnDelete();
                        $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
                        $table->unsignedTinyInteger('status')->default(0);
                        $table->timestamps();
                    });
    }

    public function down()
    {
        //
    }
};
