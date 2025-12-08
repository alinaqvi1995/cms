<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
            Schema::create('users', function (Blueprint $table) {
                        $table->id();
                        $table->string('name');
                        $table->string('email')->unique();
                        $table->unsignedTinyInteger('role')->default(3);
                        $table->timestamp('email_verified_at')->nullable();
                        $table->string('password');
                        $table->rememberToken();
                        $table->unsignedTinyInteger('status')->default(1);
                        $table->unsignedTinyInteger('delete_status')->default(0);
                        $table->unsignedBigInteger('department_id')->nullable();
                        $table->timestamps();
                        $table->string('device_token')->nullable();
                    });
    }

    public function down()
    {
        //
    }
};
