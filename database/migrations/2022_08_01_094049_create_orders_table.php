<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('type_of_business')->nullable()->comment('business name in company and entity type in agent');

            $table->string('company_name')->nullable()->comment('company related');
            $table->string('physical_address')->nullable()->comment('company related');
            $table->string('company_mailing_address')->nullable()->comment('company related');
            $table->string('management_type')->nullable()->comment('company related');

            $table->string('how_many_members')->nullable()->comment('company related');

            $table->double('total')->default(0);
            $table->boolean('order_type')->default(0)->comment('0 for company and 1 for agent');
            $table->boolean('payment_type')->default(0)->comment('0 for stripe and 1 for paypal');
            $table->boolean('payment_status')->default(0)->comment('0 for pending,1 for accepted and 2 for rejected');
            $table->string('payment_id');
            $table->string('order_information')->nullable()->comment('agent related');


            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->text('mailing_address')->nullable();
            $table->string('zip_postal_code')->nullable();
            $table->string('city')->nullable();
            $table->string('state_province')->nullable();
            $table->string('country')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->integer('attorney')->default(0);
            $table->string('attorney_first_name')->nullable();
            $table->string('attorney_last_name')->nullable();
            $table->string('attorney_mailing_address')->nullable();

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
        Schema::dropIfExists('orders');
    }
}
