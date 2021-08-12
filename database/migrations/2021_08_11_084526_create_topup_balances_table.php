<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopupBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topup_balances', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('topupable_id')->nullable();
            $table->string('topupable_type',50)->nullable();
            $table->string('mobile_number',13);
            $table->string('value',100);            
            $table->timestamps();
            $table->softDeletes('deleted_at', 0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('topup_balances');
    }
}
