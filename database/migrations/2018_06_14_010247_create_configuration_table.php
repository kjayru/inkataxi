<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigurationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configurations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numintentos');
            $table->string('limitekm');
            $table->string('tiempoespera');
            $table->string('tiempocortesia');
            $table->time('horapuntainicial');
            $table->double('costokm',4,2);
            $table->integer('service_type_id')->unsigned()->index();
            $table->foreign('service_type_id')->references('id')->on('service_types')->onDelete('cascade');
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
        Schema::dropIfExists('configurations');
    }
}
