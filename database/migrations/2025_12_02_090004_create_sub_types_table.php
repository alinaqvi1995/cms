<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
            Schema::create('sub_types', function (Blueprint $table) {
                        $table->id();
                        $table->foreignId('type_id')->constrained('complaint_types')->cascadeOnUpdate()->cascadeOnDelete();
                        $table->string('title');
                        $table->timestamps();
                    });
    }

    public function down()
    {
        //
    }
};
