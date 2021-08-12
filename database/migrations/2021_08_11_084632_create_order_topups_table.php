<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTopupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_topups', function (Blueprint $table) {
            $table->increments('id');            
            $table->unsignedInteger('topup_id');
            $table->unsignedInteger('ordertopupable_id')->nullbale();
            $table->string('ordertopupable_type')->nullbale();
            $table->string('order_no',11);
            $table->string('total',150);
            $table->date('date');
            $table->enum('status',['failed','success','canceled','unpaid'])->default('unpaid');
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
        Schema::dropIfExists('order_topups');
    }
}
