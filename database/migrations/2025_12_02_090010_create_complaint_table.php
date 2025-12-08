<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
            Schema::create('complaint', function (Blueprint $table) {
                        $table->id();
                        $table->string('comp_num')->default('COMPLAINT-0000');
                        $table->unsignedBigInteger('type_id')->nullable();
                        $table->unsignedBigInteger('subtype_id')->nullable();
                        $table->unsignedBigInteger('prio_id')->nullable();
                        $table->unsignedBigInteger('customer_id')->nullable();
                        $table->string('customer_num')->nullable();
                        $table->string('customer_cnic')->nullable();
                        $table->string('business_nature')->nullable();
                        $table->string('residential_type')->nullable();
                        $table->unsignedBigInteger('shops_count')->nullable();
                        $table->string('title')->nullable();
                        $table->longText('description');
                        $table->string('customer_name')->nullable();
                        $table->string('phone')->nullable();
                        $table->string('email')->nullable();
                        $table->string('address')->nullable();
                        $table->string('landmark')->nullable();
                        $table->string('image')->nullable();
                        $table->integer('status')->default(0);
                        $table->string('source')->default('whatsapp');
                        $table->string('before_image')->nullable();
                        $table->string('after_image')->nullable();
                        $table->longText('agent_description')->nullable();
                        $table->timestamps();
                        $table->string('image2')->nullable();
                        $table->string('lat')->default('0');
                        $table->string('lng')->default('0');
                        $table->string('image3')->nullable();
                    });
            
                    Schema::table('complaint', function (Blueprint $table) {
                        $table->foreign('type_id')->references('id')->on('complaint_types')->nullOnDelete()->cascadeOnUpdate();
                        $table->foreign('subtype_id')->references('id')->on('sub_types')->nullOnDelete()->cascadeOnUpdate();
                        $table->foreign('prio_id')->references('id')->on('priorities')->nullOnDelete()->cascadeOnUpdate();
                        $table->foreign('customer_id')->references('id')->on('customers')->nullOnDelete()->cascadeOnUpdate();
                    });
    }

    public function down()
    {
        //
    }
};
