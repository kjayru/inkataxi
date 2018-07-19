<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pays', function (Blueprint $table) {
            $table->increments('id');
            $table->string('details');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('travel_id')->unsigned()->index();
            $table->foreign('travel_id')->references('id')->on('travels')->onDelete('cascade');
            $table->integer('pay_type_id')->unsigned()->index();
            $table->foreign('pay_type_id')->references('id')->on('pay_types')->onDelete('cascade');
            
            $table->integer('service_type_id')->unsigned()->index();
            $table->foreign('service_type_id')->references('id')->on('type_services')->onDelete('cascade');
            
            $table->integer('cancellation_type_id')->unsigned()->index();
            $table->foreign('cancellation_type_id')->references('id')->on('type_services')->onDelete('cascade');
             
            $table->integer('promotion_id')->unsigned()->index();
            $table->foreign('promotion_id')->references('id')->on('promotions')->onDelete('cascade');

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
        Schema::dropIfExists('pays');
    }
}
