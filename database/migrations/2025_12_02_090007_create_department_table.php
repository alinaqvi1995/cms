<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
            Schema::create('department', function (Blueprint $table) {
                        $table->id();
                        $table->unsignedBigInteger('comp_type_id')->nullable();
                        $table->string('name');
                        $table->string('description')->nullable();
                        $table->unsignedTinyInteger('status')->default(1);
                        $table->timestamps();
                    });
    }

    public function down()
    {
        //
    }
};
