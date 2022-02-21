<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPerdinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_perdins', function (Blueprint $table) {
            $table->id();
            $table->foreign('zone_id')->references('id')->on('zones')->nullable();
            $table->foreign('user_id')->references('id')->on('user_projects')->nullable();
            $table->string('project_name',100)->nullable();
            $table->string('official_travel_site',100)->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('purpose_bussiness_trip')->nullable();
            $table->integer('long_tour_duty')->nullable();
            $table->bigInteger('hotel')->nullable();
            $table->bigInteger('rented_house')->nullable();
            $table->bigInteger('meal_allowance')->nullable();
            $table->bigInteger('hardship_allowance')->nullable();
            $table->bigInteger('pulse_comm_allow')->nullable();
            $table->bigInteger('local_transportation')->nullable();
            $table->bigInteger('air_fare_bus_train')->nullable();
            $table->bigInteger('vehicle_rental')->nullable();
            $table->bigInteger('airport_tax')->nullable();
            $table->bigInteger('entertainment')->nullable();
            $table->bigInteger('fee_support_worker')->nullable();
            $table->bigInteger('atk')->nullable();
            $table->bigInteger('others')->nullable();
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
        Schema::dropIfExists('data_perdins');
    }
}