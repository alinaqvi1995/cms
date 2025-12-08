<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
            Schema::create('bounce_back_complaint', function (Blueprint $table) {
                        $table->id();
                        $table->foreignId('complaint_id')->constrained('complaint')->cascadeOnDelete();
                        $table->enum('type', ['department','agent']);
                        $table->foreignId('agent_id')->constrained('mobile_agent')->cascadeOnDelete();
                        $table->enum('status',['active','resolved'])->default('active');
                        $table->text('reason')->nullable();
                        $table->foreignId('bounced_by')->constrained('users')->cascadeOnDelete();
                        $table->timestamp('bounced_at')->useCurrent();
                        $table->timestamps();
                    });
    }

    public function down()
    {
        //
    }
};
