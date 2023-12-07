<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentRenewalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_renewals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->integer('cash')->nullable();
            $table->integer('tradeNotesInput')->nullable();
            $table->integer('allowanceInput')->nullable();
            $table->integer('accountsReceivable')->nullable();
            $table->integer('governmentObligations')->nullable();
            $table->integer('securities')->nullable();
            $table->integer('currentAssets')->nullable();
            $table->integer('loans')->nullable();
            $table->integer('mortgage')->nullable();
            $table->integer('otherInvestments')->nullable();
            $table->integer('buildings')->nullable();
            $table->integer('depietableAssets')->nullable();
            $table->integer('land')->nullable();
            $table->integer('intangibleAssets')->nullable();
            $table->integer('accumulatedAmortization')->nullable();
            $table->integer('intangibleAmortization')->nullable();
            $table->integer('otherAssets')->nullable();
            $table->integer('totalAssetsValue')->nullable();
            $table->integer('cirtify')->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('agent_renewals');
    }
}
