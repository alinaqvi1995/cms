<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
            Schema::create('complaint_assign_agent', function (Blueprint $table) {
                        $table->id();
                        $table->foreignId('complaint_id')->constrained('complaint')->cascadeOnDelete();
                        $table->foreignId('agent_id')->constrained('mobile_agent')->cascadeOnDelete();
                        $table->unsignedTinyInteger('status')->default(1);
                        $table->timestamps();
                    });
    }

    public function down()
    {
        //
    }
};
