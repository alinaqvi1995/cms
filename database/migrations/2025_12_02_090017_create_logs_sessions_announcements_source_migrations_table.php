<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
            Schema::create('logs', function (Blueprint $table) {
                        $table->id();
                        $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
                        $table->string('action');
                        $table->unsignedBigInteger('action_id');
                        $table->longText('action_detail');
                        $table->timestamps();
                    });
            
                    Schema::create('sessions', function (Blueprint $table) {
                        $table->string('id')->primary();
                        $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
                        $table->string('ip_address',45)->nullable();
                        $table->text('user_agent')->nullable();
                        $table->longText('payload');
                        $table->integer('last_activity');
                    });
            
                    Schema::create('announcements', function (Blueprint $table) {
                        $table->id();
                        $table->string('title');
                        $table->string('image')->nullable();
                        $table->longText('description')->nullable();
                        $table->unsignedTinyInteger('status')->default(1);
                        $table->timestamps();
                    });
            
                    Schema::create('source', function (Blueprint $table) {
                        $table->id();
                        $table->string('title');
                        $table->timestamps();
                    });
    }

    public function down()
    {
        //
    }
};
