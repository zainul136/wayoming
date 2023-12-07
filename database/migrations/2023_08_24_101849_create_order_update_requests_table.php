<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderUpdateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_update_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_update_id')->nullable();
            $table->string('company_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('country')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('company_mailing_address')->nullable();
            $table->string('company_physical_address')->nullable();
            $table->string('mailing_address')->nullable();
            $table->string('zip_postal_code')->nullable();
            $table->string('city')->nullable();
            $table->string('state_province')->nullable();
            $table->unsignedBigInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_update_requests');
    }
}
