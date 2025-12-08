<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
            Schema::create('customers', function (Blueprint $table) {
                        $table->id();
                        $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
                        $table->string('customer_id');
                        $table->string('customer_name');
                        $table->string('customer_cnic')->nullable();
                        $table->string('business_nature')->nullable();
                        $table->string('residential_type')->nullable();
                        $table->unsignedBigInteger('shops_count')->nullable();
                        $table->string('phone');
                        $table->string('address');
                        $table->unsignedTinyInteger('status')->default(1);
                        $table->timestamps();
                    });
    }

    public function down()
    {
        //
    }
};
